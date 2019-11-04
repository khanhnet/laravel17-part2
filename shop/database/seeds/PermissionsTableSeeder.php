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
        //quyền cho admin
        DB::table('permissions')->insert([
            'name' => 'Thêm mới admin',
            'slug' => 'add-admin',
            'description' => 'Thêm mới admin',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Sửa admin',
            'slug' => 'update-admin',
            'description' => 'Sửa admin',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xóa admin',
            'slug' => 'delete-admin',
            'description' => 'Xóa admin',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xem danh sách admin',
            'slug' => 'list-admin',
            'description' => 'Xem danh sách admin',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Kích hoạt/Hủy kích hoạt admin',
            'slug' => 'active-admin',
            'description' => 'Kích hoạt/Hủy kích hoạt admin',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Phân quyền admin',
            'slug' => 'permissions-admin',
            'description' => 'Phân quyền admin',
            
        ]);
        //quyền cho option
        DB::table('permissions')->insert([
            'name' => 'Thêm mới option',
            'slug' => 'add-option',
            'description' => 'Thêm mới option',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Sửa option',
            'slug' => 'update-option',
            'description' => 'Sửa option',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xóa option',
            'slug' => 'delete-option',
            'description' => 'Xóa option',
            
        ]);
        DB::table('permissions')->insert([
            'name' => 'Xem danh sách option',
            'slug' => 'list-option',
            'description' => 'Xem danh sách option',
            
        ]);
    }
}
