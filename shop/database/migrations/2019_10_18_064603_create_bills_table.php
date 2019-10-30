<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('to_name');
            $table->string('to_address');
            $table->string('to_mobile');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');;
            $table->bigInteger('total');
            $table->date('time_ship')->comment('thời gian vận chuyển dự kiến');
            $table->string('note')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0:chưa xác nhận;1:đã xác nhận;2:đang giao hàng;3:đã thanh toán;4:đã hủy đơn');
            $table->bigInteger('user_id')->unsigned()->comment('nhân viên xác nhận đơn');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
