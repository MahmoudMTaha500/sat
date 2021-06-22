<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaQuestionChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_question_choices', function (Blueprint $table) {
            $table->id();
            $table->string("choice_ar");
            $table->bigInteger("question_id")->unsigned();
            $table->foreign('question_id')->references('id')->on('visa_questions')->onDelete('cascade');
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
        Schema::dropIfExists('visa_question_choices');
    }
}
