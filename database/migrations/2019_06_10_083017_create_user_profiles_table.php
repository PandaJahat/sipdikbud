<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();

            $table->string('fullname');
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();

            $table->string('province_id', 10)->nullable();
            $table->string('district_id', 10)->nullable();
            $table->string('subdistrict_id', 10)->nullable();
            $table->string('village_id', 10)->nullable();

            $table->text('address')->nullable();
            $table->text('institute')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('restrict');

            $table->foreign('village_id')
            ->references('id')->on('villages')
            ->onDelete('restrict');

            $table->foreign('subdistrict_id')
            ->references('id')->on('subdistricts')
            ->onDelete('restrict');

            $table->foreign('district_id')
            ->references('id')->on('districts')
            ->onDelete('restrict');

            $table->foreign('province_id')
            ->references('id')->on('provinces')
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
        Schema::dropIfExists('user_profiles');
    }
}
