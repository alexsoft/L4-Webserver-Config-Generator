<?php namespace Alexsoft\WebserverGenerator;

use Illuminate\Support\ServiceProvider;
use Alexsoft\WebserverGenerator\Commands\NginxGeneratorCommand;
use Alexsoft\WebserverGenerator\Commands\ApacheGeneratorCommand;
use Illuminate\Support\Facades\View as V;

class WebserverGeneratorServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('alexsoft/webserver-config-generator');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        V::addNamespace('webserver-config-generator', __DIR__ . '/views');

        $this->app['webserver.nginx.generator'] = $this->app->share(function ($app) {
            return new NginxGeneratorCommand();
        });

        $this->app['webserver.apache.generator'] = $this->app->share(function ($app) {
            return new ApacheGeneratorCommand();
        });

        $this->commands('webserver.nginx.generator');
        $this->commands('webserver.apache.generator');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('webserver.nginx.generator', 'webserver.apache.generator');
    }

}
