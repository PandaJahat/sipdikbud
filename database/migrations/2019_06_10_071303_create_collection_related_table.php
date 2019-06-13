<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_related', function (Blueprint $table) {
            $table->bigInteger('first_collection_id')->unsigned();
            $table->bigInteger('second_collection_id')->unsigned();

            $table->foreign('first_collection_id')
            ->references('id')->on('collections')
            ->onDelete('restrict');

            $table->foreign('second_collection_id')
            ->references('id')->on('collections')
            ->onDelete('restrict');

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
        Schema::dropIfExists('collection_related');
    }
}
