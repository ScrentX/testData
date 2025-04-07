<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up() {
        Schema::create('student_results', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 50);
            $table->unsignedBigInteger('exam_id');
            $table->string('exam_ref_code', 255);
            $table->integer('total_questions');
            $table->integer('correct_answers');
            $table->integer('incorrect_answers');
            $table->decimal('score_percentage', 5, 2);
            $table->string('status', 10);
            $table->timestamps();


            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('exam_id')->references('exam_id')->on('exams')->onDelete('cascade');
        });

        DB::table("student_results")->insert([
            [
                "student_id" => "00001", 
                "exam_id" => 1,
                "exam_ref_code" => "EXAM001",
                "total_questions" => 10,
                "correct_answers" => 8,
                "incorrect_answers" => 2,
                "score_percentage" => 80.00,
                "status" => "Passed",
            ],
            [
                "student_id" => "00002",
                "exam_id" => 2,
                "exam_ref_code" => "EXAM002",
                "total_questions" => 15,
                "correct_answers" => 9,
                "incorrect_answers" => 6,
                "score_percentage" => 60.00,
                "status" => "Failed",
            ],
            [
                "student_id" => "00003", 
                "exam_id" => 3,
                "exam_ref_code" => "EXAM003",
                "total_questions" => 20,
                "correct_answers" => 18,
                "incorrect_answers" => 2,
                "score_percentage" => 90.00,
                "status" => "Passed",
            ],
        ]);
        
    }

    public function down() {
        Schema::dropIfExists('student_results');
    }
};
