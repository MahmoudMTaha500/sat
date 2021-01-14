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
            $table->string("about_ar");
            $table->string("img")->nullable();
            $table->string("logo")->nullable();
            $table->integer("creator_id")->nullable();
            $table->integer("country_id");
            $table->integer("city_id");
            $table->integer("sat_rate")->nullable();
            $table->integer("rate_switch")->nullable();
            $table->integer("active")->nullable();
            $table->integer("approvment")->nullable();
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
