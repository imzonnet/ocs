<?php namespace App\Components\Dashboard\Database\Seeds;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder {

    public function run()
    {

        $faker = Faker::create();

        //add role
        $admin = new \App\Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $member = new \App\Role();
        $member->name         = 'member';
        $member->display_name = 'Member'; // optional
        $member->description  = 'Member'; // optional
        $member->save();

        //add user
        $user = new \App\User();
        $user->first_name = "John";
        $user->last_name = "Nguyen";
        $user->email = "vnzacky39@gmail.com";
        $user->password = bcrypt('123456');
        $user->city = 'Da Nang';
        $user->address = 'Hai Chau';
        $user->country = 'Viet Nam';
        $user->gender = 1;
        $user->birthday = \Carbon\Carbon::createFromDate(1993, 10, 10);
        $user->activated = 1;
        $user->save();
        $user->attachRole($admin);

        $user2 = new \App\User();
        $user2->first_name = "Simon";
        $user2->last_name = "Vu";
        $user2->email = "tusinh.information@gmail.com";
        $user2->password = bcrypt('123456');
        $user2->city = 'Da Nang';
        $user2->address = 'Hai Chau';
	    $user2->country = 'Viet Nam';
        $user2->gender = 1;
        $user2->birthday = \Carbon\Carbon::createFromDate(1985, 10, 10);
        $user2->activated = 1;
        $user2->save();
        $user2->attachRole($admin);
/*
        foreach(range(0, 15) as $index) {
            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'avatar' =>  $faker->imageUrl(375, 235, 'people'),
                'city' => $faker->city,
                'state' => $faker->state,
                'zipcode' => $faker->postcode,
                'gender' => rand(0,1),
                'lat' => $faker->latitude,
                'long' => $faker->longitude,
                'birthday' => \Carbon\Carbon::createFromDate(1985, rand(1, 12), rand(1, 29))->addYear(rand(0, 10)),
                'activated' => 1
            ]);
            $user->attachRole($member);
        }
*/
    }

}
