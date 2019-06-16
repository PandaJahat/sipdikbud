<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionDownloadLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_download_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('collection_id')->unsigned();
            $table->string('category');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('collection_id')
            ->references('id')->on('collections')
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
        Schema::dropIfExists('collection_download_logs');
    }
}
