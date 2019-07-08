<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionReviewResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_review_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('collection_reviewer_id')->unsigned();
            $table->boolean('status');

            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('collection_reviewer_id')
            ->references('id')->on('collection_reviewer')
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
        Schema::dropIfExists('collection_review_results');
    }
}
