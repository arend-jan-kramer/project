<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Links extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table){
            $table->increments('id');
            $table->string('title', 35);
            $table->string('link', 35);
        });

        DB::table('links')->insert(
            array(
                array(
                    'title' => 'Reserveren',
                    'link' => 'reserveren'
                ),
                array(
                    'title' => 'Bestel menu',
                    'link' => 'bestel-menu'
                ),
                array(
                    'title' => 'Overzicht',
                    'link' => 'overzicht'
                ),
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
        Schema::drop('links');
    }
}
