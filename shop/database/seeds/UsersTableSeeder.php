<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
    	for ($i = 0 ; $i < 4; $i++){
    		\DB::table('users')->insert([
    			'name'  => $faker->name,
    			'email'  => $faker->email,
    			'password'  => bcrypt('123456'),
    			'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
    		]);
    	}
    }
}
