<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reservations', function (Blueprint $table){
            $table->increments('id');
            $table->string('customers_id', 35);
            $table->string('table_id',3);
            $table->string('x_table',60);
            $table->timestamp('table_date_time');
            $table->string('reservation_time', 1);
            $table->string('x_people', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_reservations');
    }
}
