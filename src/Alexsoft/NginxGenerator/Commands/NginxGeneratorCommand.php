<?php
namespace Alexsoft\NginxGenerator\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use View;
use File;

class NginxGeneratorCommand extends Command
{

    /**
     * The console command name.
     * @var string
     */
    protected $name = 'nginx:generate';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Generate a configuration file for nginx';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function fire()
    {
        $env = $this->option('env');

        $serverName = $this->ask('Which server name will it be? (e.g. google.com)');
        if (is_null($serverName)) {
            $this->error('Error! You have to specify server name!');
            exit;
        }

        $fileName = $this->ask('Which name should the file have? [nginx.conf]', 'nginx.conf');

        $logsPath = $this->ask('Where should access and error logs be placed? [' . storage_path('logs') . ']', storage_path('logs'));

        $fastcgiPass = $this->ask('Specify a fastcgi_pass parameter [unix:/var/run/php5-fpm.sock]', 'unix:/var/run/php5-fpm.sock');

        if (is_null($env)) {
            $directory = app_path('config/');
        } else {
            $directory = app_path('config/' . $env . '/');
        }

        $file = $directory . $fileName;

        if (File::exists($file)) {
            if (!$this->confirm("{$file} exists. Do you want to overwrite it? [yes|NO]", FALSE)) {
                exit;
            }
        } else {
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory);
            }
        }

        $content = View::make('nginx-generator::nginx', compact('serverName', 'logsPath', 'fastcgiPass'))->render();
        if (File::put($file, $content)) {
            $this->comment("File {$file} was successfully created!");
        } else {
            $this->error('Something went wrong. Check writing permissions and try again.');
        }
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return array();
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return array();
    }

}
