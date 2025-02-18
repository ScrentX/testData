<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_ref_code')->unique();
            $table->integer('exam_time');
            $table->json('question_ids');
            $table->date('exam_date');
            $table->unsignedBigInteger('subject_id');
            $table->string('school_year');
            $table->timestamps();

           $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
