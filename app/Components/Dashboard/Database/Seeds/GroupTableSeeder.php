<?php namespace App\Components\Dashboard\Database\Seeds;
use App\Components\Dashboard\Models\CustomerGroup;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder {

    public function run()
    {

        $faker = Faker::create();

        foreach(range(0, 5) as $index) {
            CustomerGroup::create([
	            'title' => "Group $index",
	            'description' => $faker->paragraph()
            ]);
        }
    }

}
