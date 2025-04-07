<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id('exam_id');
            $table->string('exam_ref_code', 255);
            $table->integer('exam_time');
            $table->text('question_ids');
            $table->date('exam_date');
            $table->unsignedBigInteger('subject_id');
            $table->string('school_year', 9); 

            $table->foreign('subject_id')->references('subject_id')->on('subjects')->onDelete('cascade');
        });

 
        DB::table("exams")->insert([
            [
                "exam_ref_code" => "001",
                "exam_time" => 50,
                "question_ids" => "1",
                "exam_date" => "2023-01-01", 
                "subject_id" => 1,
                "school_year" => "2022-2023", 
            ],
            [
                "exam_ref_code" => "002",
                "exam_time" => 70,
                "question_ids" => "1",
                "exam_date" => "2024-01-01", 
                "subject_id" => 2,
                "school_year" => "2023-2024",
            ],
            [
                "exam_ref_code" => "003",
                "exam_time" => 60,
                "question_ids" => "1",
                "exam_date" => "2025-01-01", 
                "subject_id" => 3,
                "school_year" => "2024-2025",
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
