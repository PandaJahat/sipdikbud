<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_genre', function (Blueprint $table) {
            $table->bigInteger('collection_id')->unsigned();
            $table->bigInteger('genre_id')->unsigned();

            $table->foreign('collection_id')
            ->references('id')->on('collections')
            ->onDelete('restrict');

            $table->foreign('genre_id')
            ->references('id')->on('genres')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_genre');
    }
}
