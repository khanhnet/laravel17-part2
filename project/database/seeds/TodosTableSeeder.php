<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();
    	for ($i = 0 ; $i < 200; $i++){
    		\DB::table('todos')->insert([
    			'title'  => $faker->text(20),
    			'content' => $faker->text(200),
                'user_id' => $faker->randomDigit(),
    		]);
    	}
    }
}
