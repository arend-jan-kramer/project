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
            $table->boolean('visible');
            $table->longText('image_url');
            $table->timestamps();
        });

        DB::table('tbl_orderlists')->insert(
            array(
                array(
                    'order_name' => 'Snack',
                    'description' => 'Patat, Frikandel/Kroket/kaas souflé, Mayo/Curry/Pinda',
                    'price' => '4.50',
                    'visible' => true,
                    'image_url' => 'uploads\included\IMG_0947.jpg'
                ),
                array(
                    'order_name' => 'Chinees',
                    'description' => 'Rijst, Bami, Koelokaai, nasi, Kroepoek'
                    'price' => '14.95',
                    'visible' => true,
                    'image_url' => 'uploads\included\IMG_0947.jpg'
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
