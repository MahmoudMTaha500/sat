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
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->bigInteger("course_id")->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->bigInteger("institute_id")->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->longText('institute_message')->nullable();
            $table->string('status');
            $table->boolean('payment_status')->default(0)->comment('0 = not paid & 1 = paid & 2 = partially paid');
            $table->integer('weeks')->default(1);
            $table->integer('residence_weeks')->default(1)->nullable();
            $table->decimal('price_per_week')->default(0);
            $table->decimal('course_discount')->default(0);
            $table->bigInteger("residence_id")->unsigned()->nullable();
            $table->foreign('residence_id')->references('id')->on('residences')->onDelete('cascade');
            $table->decimal('residence_price')->default(0);
            $table->bigInteger("airport_id")->unsigned()->nullable();
            $table->foreign('airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->decimal('airport_price')->default(0);
            $table->decimal('insurance_price')->default(0);
            $table->decimal('course_booking_fees')->default(0);
            $table->decimal('residence_booking_fees')->default(0);
            $table->decimal('course_summer_increase_weeks')->default(0);
            $table->decimal('course_summer_increase')->default(0);
            $table->decimal('residence_summer_increase_weeks')->default(0);
            $table->decimal('residence_summer_increase')->default(0);
            $table->decimal('course_textboox_fees')->default(0);
            $table->decimal('total_price')->default(0);
            $table->decimal('paid_price')->default(0);
            $table->decimal('remaining_price')->default(0);
            $table->string('from_date');
            $table->string('to_date');
            $table->string('residence_to_date');
            $table->longText('note')->nullable();
            $table->longText('classat_note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_requests');
    }
}
