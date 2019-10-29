<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
    		$name=$faker->text(20);
    		\DB::table('categories')->insert([
    			'name'  => $name,
    			'thumbnail'  => $name,
    			'slug'  => \Illuminate\Support\str::slug($name),
    			'content' => $faker->text(200),
    			'parent_id' => '1',
    		]);
    	}
    }
}
