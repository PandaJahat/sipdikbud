<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_topic', function (Blueprint $table) {
            $table->bigInteger('collection_id')->unsigned();
            $table->bigInteger('topic_id')->unsigned();

            $table->foreign('collection_id')
            ->references('id')->on('collections')
            ->onDelete('restrict');

            $table->foreign('topic_id')
            ->references('id')->on('topics')
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
        Schema::dropIfExists('collection_topic');
    }
}
