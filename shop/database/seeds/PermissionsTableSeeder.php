<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//quyền cho sản phẩm
        DB::table('permissions')->insert([
            'name' => 'Thêm mới sản phẩm',
            'slug' => 'add-product',
            'description' => 'Thêm mới sản phẩm',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Sửa sản phẩm',
            'slug' => 'update-product',
            'description' => 'Sửa sản phẩm',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xóa sản phẩm',
            'slug' => 'delete-product',
            'description' => 'Xóa sản phẩm',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xem chi tiết sản phẩm',
            'slug' => 'detail-product',
            'description' => 'Xem chi tiết sản phẩm',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xem danh sách sản phẩm',
            'slug' => 'list-product',
            'description' => 'Xem danh sách sản phẩm',
            
        ]);
        //quyền cho danh mục
        DB::table('permissions')->insert([
            'name' => 'Thêm mới danh mục',
            'slug' => 'add-category',
            'description' => 'Thêm mới danh mục',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Sửa danh mục',
            'slug' => 'update-category',
            'description' => 'Sửa danh mục',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xóa danh mục',
            'slug' => 'delete-category',
            'description' => 'Xóa danh mục',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xem danh sách danh mục',
            'slug' => 'list-category',
            'description' => 'Xem danh sách danh mục',
            
        ]);
    }
}
