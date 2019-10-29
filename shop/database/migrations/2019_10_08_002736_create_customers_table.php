<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('code');
           $table->string('name')->nullable();
           $table->string('image')->nullable();
           $table->string('email')->unique();
           $table->timestamp('email_verified_at');
           $table->tinyInteger('gender')->comment('Giới tính:nam=1;nữ=0;khác=2')->nullable();
           $table->rememberToken();
           $table->string('mobile')->unique();
           $table->date('birthday')->nullable();
           $table->string('address')->nullable();
           $table->string('password');
           $table->tinyInteger('status')->comment('trạng thái:hoạt động=1;không hoạt động=0');
           $table->tinyInteger('is_active')->comment('trạng thái:đã kích hoạt=1;chưa kích hoạt=0');
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
        Schema::dropIfExists('customers');
    }
}