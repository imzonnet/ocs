<?php namespace App\Components\Dashboard\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DashboardDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE TABLE users');
        DB::statement('TRUNCATE TABLE roles');
        DB::statement('TRUNCATE TABLE role_user');
        DB::statement('TRUNCATE TABLE password_resets');
        DB::statement('TRUNCATE TABLE permissions');
        DB::statement('TRUNCATE TABLE permission_role');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
		$this->call(UserTableSeeder::class);
	}

}
