<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');

            $table->string('published_by')->nullable();
            $table->integer('published_year')->nullable();

            $table->longText('description')->nullable();

            $table->text('cover_file')->nullable();
            $table->text('document_file')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->boolean('is_active')->default(1);

            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('collections');
    }
}
