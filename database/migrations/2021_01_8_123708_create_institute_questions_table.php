<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituteQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->bigInteger('institute_id')->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes');

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
        Schema::dropIfExists('institute_questions');
    }
}
