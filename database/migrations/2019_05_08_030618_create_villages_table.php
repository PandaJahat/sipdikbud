<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('subdistrict_id', 10);

            $table->string('code');
            $table->string('name');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('subdistrict_id')
            ->references('id')->on('subdistricts')
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
        Schema::dropIfExists('villages');
    }
}
