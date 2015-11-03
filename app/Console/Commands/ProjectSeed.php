<?php namespace App\Console\Commands;

use App\Components\Dashboard\Database\Seeds\DashboardDatabaseSeeder;
use Illuminate\Console\Command;

class ProjectSeed extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'project:seed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Project seed data';

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
		$this->info('Importing Sample Data...');
        //seed user
        $this->call('db:seed', ['--class' => DashboardDatabaseSeeder::class]);

        $this->info('Import Completed!');

        $this->info('_________________________________________');
        $this->info(' Admin Account: vnzacky39@gmail.com | 123456 ');
        $this->error('Thank You! :))');
	}


}
