<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function(Blueprint $table){
            $table->increments('id');
            $table->integer('reservation_id');//->unsigned();
            $table->string('order_name', 35);
            $table->longText('description');
            $table->string('x_drinks', 10);
            $table->string('price', 10);

            //$table->foreign('reservation_id')->references('id')->on('tbl_reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_orders');
        //$table->foreign('reservation_id')->references('id')->on('tbl_reservations')->onDelete('cascade');
    }
}
