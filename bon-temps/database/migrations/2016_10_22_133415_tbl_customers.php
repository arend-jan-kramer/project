<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::Create('tbl_customers', function (Blueprint $table){
            $table->increments('id');
            $table->string('name', 35);
            $table->string('address', 55);
            $table->string('city', 55);
            $table->string('email', 55)->unique();
            $table->string('phone_number',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_customers');
    }
}
