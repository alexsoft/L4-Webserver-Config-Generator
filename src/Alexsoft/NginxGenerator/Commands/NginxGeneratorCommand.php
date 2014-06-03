<?php
namespace Alexsoft\NginxGenerator\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class NginxGeneratorCommand extends Command
{

	/**
	 * The console command name.
	 * @var string
	 */
	protected $name = 'nginx:gen';

	/**
	 * The console command description.
	 * @var string
	 */
	protected $description = 'Generate nginx conf';

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
		$serverName = $this->argument('serverName');

		$env = $this->option('env') ?: 'production';
		$fileName = $this->option('file');

		dd(compact('env', 'serverName', 'fileName'));

		





		$data = array(
			'serverName' => '',
			'logsPath' => storage_path('logs'),
			'fastcgiPass' => ''
		);

		die;
		$env = $this->option('env');
		if (!isset($env)) {
			$env = 'production';
		}

		$dir = app_path() . '/config/' . $env;
		$file = $dir . '/' . $this->option('file');

		if (File::exists($file)) {
			if (!$this->confirm("{$file} exists. Do you want to overwrite it? [yes|NO]", FALSE)) {
				exit;
			}
		} else {
			if (!File::isDirectory($dir)) {
				File::makeDirectory($dir);
			}
		}

		File::put(
			$file,
			"server {\n" .
			"	server_name {$this->argument('server')};\n\n" .
			File::get(app_path() . '/config/nginx.conf') .
			"\n}"
		);
	}

	/**
	 * Get the console command arguments.
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('serverName', InputArgument::REQUIRED, 'Server name (e.g. google.com)')
		);
	}

	/**
	 * Get the console command options.
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('logs', NULL, InputArgument::OPTIONAL, 'Location for logs files', storage_path('logs')),
			array('file', NULL, InputArgument::OPTIONAL, 'Name of nginx config file', 'nginx.conf')
		);
	}

}