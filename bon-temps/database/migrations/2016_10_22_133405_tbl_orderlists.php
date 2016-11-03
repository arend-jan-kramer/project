<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblOrderlists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orderlists', function (Blueprint $table){
            $table->increments('id');
            $table->string('order_name', 35);
            $table->longText('description');
            $table->string('price', 10);
            $table->string('visible', 1);
            $table->timestamps();
        });

        DB::table('tbl_orderlists')->insert(
            array(
                array(
                    'order_name' => 'hoi',
                    'description' => 'testkipje',
                    'price' => '12.00',
                    'visible' => '1'
                ),
                array(
                    'order_name' => 'Weekend',
                    'description' => 'Friet,Hamburger,Frikandel,Mayo',
                    'price' => '7.95',
                    'visible' => '1'
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
        Schema::drop('tbl_orderlists');
    }
}
