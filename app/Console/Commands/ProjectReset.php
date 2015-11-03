<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ProjectReset extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'project:reset';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $this->info('Reset Project...');
        $this->call('migrate:reset', ['force']);

        $this->info('Rollback all database migrations!');
	}

}
