<?php namespace Alexsoft\NginxGenerator;

use Alexsoft\NginxGenerator\Commands\NginxGeneratorCommand;
use Illuminate\Support\ServiceProvider;

class NginxGeneratorServiceProvider extends ServiceProvider {

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
		$this->package('alexsoft/nginx-generator');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['nginx.generator'] = $this->app->share(function($app)
		{
			return new NginxGeneratorCommand();
		});

		$this->commands('nginx.generator');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('nginx.generator');
	}

}
