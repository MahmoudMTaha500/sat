<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("visa_id")->unsigned();
            $table->foreign('visa_id')->references('id')->on('visas')->onDelete('cascade');
            $table->string("question_ar");
            $table->integer("priority");
            $table->string("field_type");
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
        Schema::dropIfExists('visa_questions');
    }
}
