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
            $table->text("about_ar");
            $table->bigInteger("institute_id")->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->bigInteger("creator_id")->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer("min_age");
            $table->date("start_day");
            $table->string("study_period");
            $table->integer("lessons_per_week");
            $table->integer("hours_per_week");
            $table->integer("approvment")->default(0);
            $table->string("required_level");
            $table->integer("discount")->nullable();
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
