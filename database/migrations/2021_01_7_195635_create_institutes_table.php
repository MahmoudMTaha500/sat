<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar");
            $table->text("about_ar");
            $table->string("logo");
            $table->string("banner");
            $table->bigInteger("creator_id")->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->bigInteger("country_id")->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->bigInteger("city_id")->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer("sat_rate");
            $table->integer("rate_switch");
            $table->integer("active");
            $table->integer("approvment");
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
        Schema::dropIfExists('institutes');
    }
}
