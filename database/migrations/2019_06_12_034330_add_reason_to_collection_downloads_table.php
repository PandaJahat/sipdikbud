<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReasonToCollectionDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collection_downloads', function (Blueprint $table) {
            $table->bigInteger('reason_id')->unsigned()->nullable();

            $table->foreign('reason_id')
            ->references('id')->on('download_reasons')
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
        Schema::table('collection_downloads', function (Blueprint $table) {
            //
        });
    }
}
