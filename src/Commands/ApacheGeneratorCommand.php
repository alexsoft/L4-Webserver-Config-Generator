<?php
namespace Alexsoft\WebserverGenerator\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use View;
use File;

class ApacheGeneratorCommand extends Command
{
    /**
     * The console command name.
     * @var string
     */
    protected $name = 'webserver:apache';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Generate a config file for apache';

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

        $fileName = $this->ask('Which name should the file have? [apache.conf]', 'apache.conf');

        $logsPath = $this->ask('Where should access and error logs be placed? [' . storage_path('logs') . ']', storage_path('logs'));

        if (is_null($env)) {
            $directory = app('path.config') . '/';
        } else {
            $directory = app('path.config') . '/' . $env . '/';
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

        $content = View::make('webserver-config-generator::apache', compact('serverName', 'logsPath'))->render();
        if (File::put($file, $content)) {
            $this->comment("File {$file} was successfully created!");
        } else {
            $this->error('Something went wrong. Check writing permissions and try again.');
        }
    }
}