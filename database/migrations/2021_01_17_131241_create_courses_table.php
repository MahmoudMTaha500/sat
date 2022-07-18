<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("name_ar");
            $table->string("slug");
            $table->text("about_ar");
            $table->bigInteger("institute_id")->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->bigInteger("creator_id")->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer("min_age")->nullable();
            $table->date("start_day")->nullable();
            $table->string("study_period")->nullable();
            $table->integer("lessons_per_week")->nullable();
            $table->integer("hours_per_week")->nullable();
            $table->integer("approvement")->default(0);
            $table->string("required_level")->nullable();
            $table->decimal("discount")->default('0');
            $table->json("textbooks_fees")->nullable();
            $table->json("course_summer_increase")->nullable();
            $table->text("title_tag")->nullable();
            $table->text("meta_keywords")->nullable();
            $table->text("meta_description")->nullable();
            $table->integer("main_course_trigger")->default(0)->comment('main institute course = 1; else = 0');
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
        Schema::dropIfExists('courses');
    }
}
