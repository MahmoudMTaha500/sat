<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string("title_ar");
            $table->string("slug");
            $table->longText("content_ar");
            $table->string("banner");
            $table->bigInteger("creator_id")->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->bigInteger("country_id")->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->bigInteger("city_id")->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->bigInteger("institute_id")->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->bigInteger("category_id")->unsigned();
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
            $table->integer("approvement");
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
        Schema::dropIfExists('blogs');
    }
}
