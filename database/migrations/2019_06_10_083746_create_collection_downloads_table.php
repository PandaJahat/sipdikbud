<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_downloads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('collection_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->text('reason_text')->nullable();

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
        Schema::dropIfExists('collection_downloads');
    }
}
