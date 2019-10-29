<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
    		\DB::table('products')->insert([
    			'name'  => $name,
    			'slug'  => \Illuminate\Support\str::slug($name),
    			'content' => $faker->text(200),
    			'price' => '1000000',
    			'sale' => '10',
    			'category_id' => '10',
    			'user_id' => '1',
    			'status' => '1',
    		]);
    	}
    }
}
