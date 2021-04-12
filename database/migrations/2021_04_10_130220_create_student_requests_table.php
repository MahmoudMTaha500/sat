<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRequestsTable extends Migration
{

    public function up()
    {
        Schema::create('student_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("student_id")->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->bigInteger("course_id")->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->longText('institute_message')->nullable();
            $table->string('status');
            $table->integer('weeks')->default(1);
            $table->bigInteger('price_per_week')->default(0);
            $table->decimal('course_discount')->default(0);
            $table->bigInteger("residence_id")->unsigned()->nullable();
            $table->foreign('residence_id')->references('id')->on('residences');
            $table->bigInteger('residence_price')->default(0);
            $table->bigInteger("airport_id")->unsigned()->nullable();
            $table->foreign('airport_id')->references('id')->on('airports');
            $table->bigInteger('airport_price')->default(0);
            $table->bigInteger('insurance_price')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->bigInteger('paid_price')->default(0);
            $table->bigInteger('remaining_price')->default(0);
            $table->string('from_date');
            $table->string('to_date');
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_requests');
    }
}
