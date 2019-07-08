<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionReviewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_reviewer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('collection_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->text('note')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('collection_id')
            ->references('id')->on('collections')
            ->onDelete('restrict');

            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('collection_reviewer');
    }
}
