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
            $table->string("slug");
            $table->text("about_ar");
            $table->longText("institute_questions");
            $table->string("logo");
            $table->string("banner");
            $table->text("logo_alt")->nullable();
            $table->text("banner_alt")->nullable();
            $table->text("title_tag")->nullable();
            $table->text("meta_keywords")->nullable();
            $table->text("meta_description")->nullable();
            $table->bigInteger("creator_id")->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->bigInteger("country_id")->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->bigInteger("city_id")->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->integer("sat_rate");
            $table->integer("rate_switch");
            $table->json("course_booking_fees")->nullable();
            $table->json("residence_booking_fees")->nullable();
            $table->string("institute_currency");
            $table->integer("institute_class")->default(9999);
            $table->integer("approvement");
            $table->longText("map")->nullable();

            $table->softDeletes();
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
