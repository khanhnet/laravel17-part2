<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name')->nullable();
            $table->string('image')->nullable()->default('https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->tinyInteger('gender')->comment('Giới tính:nam=1;nữ=0;khác=2')->nullable();
            $table->rememberToken();
            $table->string('mobile')->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->comment('trạng thái:hoạt động=1;không hoạt động=0')->default('0');
            $table->tinyInteger('is_active')->comment('trạng thái:đã kích hoạt=1;chưa kích hoạt=0')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
