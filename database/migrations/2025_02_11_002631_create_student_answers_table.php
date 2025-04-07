<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 50); 
            $table->unsignedBigInteger('question_id');
            $table->string('selected_answer', 255);
            $table->unsignedBigInteger('exam_id');
            $table->string('exam_ref_code', 255);
            $table->timestamps();

          
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('question_id')->references('question_id')->on('questions')->onDelete('cascade');
            $table->foreign('exam_id')->references('exam_id')->on('exams')->onDelete('cascade');
        });



        DB::table("student_answers")->insert([
            [
                "student_id" => "00001", 
                "question_id" => 1,
                "exam_id" => 1,
                "selected_answer" => "option1",
                "exam_ref_code" => "1", 
            ],
            [
                "student_id" => "00002", 
                "question_id" => 2,
                "exam_id" => 2,
                "selected_answer" => "option1",
                "exam_ref_code" => "1", 
            ],
            [
                "student_id" => "00003", 
                "question_id" => 3,
                "exam_id" => 3,
                "selected_answer" => "option1",
                "exam_ref_code" => "1", 
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('student_answers');
    }
};
