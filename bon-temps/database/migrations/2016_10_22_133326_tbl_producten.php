<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblProducten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table){
            $table->increments('id');
            $table->string('productname', 35);
            $table->longText('price',10);
            $table->string('category', 30);
        });

        //Database vullen
        DB::table('tbl_products')->insert(
            array(
                array(
                    'productname' => 'koffie',
                    'price' => '2.25',
                    'category' => '1'
                ),
                array(
                    'productname' => 'Cappuccino',
                    'price' => '2.75',
                    'category' => '1'
                ),
                array(
                    'productname' => 'Karamel koffie',
                    'price' => '3.25',
                    'category' => '1'
                ),
                array(
                    'productname' => 'ijs koffie',
                    'price' => '3.75',
                    'category' => '1'
                ),
                array(
                    'productname' => 'Thee',
                    'price' => '0.90',
                    'category' => '1'
                ),
                array(
                    'productname' => 'Pepsi Cola',
                    'price' => '2.20',
                    'category' => '2'
                ),
                array(
                    'productname' => 'Sisi Sinas',
                    'price' => '2.20',
                    'category' => '2'
                ),
                array(
                    'productname' => 'Fristi',
                    'price' => '2.50',
                    'category' => '2'
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_products');
    }
}
