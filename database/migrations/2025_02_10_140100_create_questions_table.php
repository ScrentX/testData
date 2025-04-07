<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id('question_id');
            $table->text('question_text');
            $table->string('option1', 255);
            $table->string('option2', 255);
            $table->string('option3', 255);
            $table->string('option4', 255);
            $table->string('correct_answer', 255);
            $table->unsignedBigInteger('subject_id');
            $table->timestamp('created_at')->useCurrent();
    
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->onDelete('cascade');
        });

        DB::table('questions')->insert([
            [
                'question_text' => 'What is the capital of the Philippines?',
                'option1' => 'Berlin',
                'option2' => 'Madrid',
                'option3' => 'Manila',
                'option4' => 'Rome',
                'correct_answer' => 'Manila',
                'subject_id' => 1, 
            ],
            [
                'question_text' => 'Which is the biggest planet in our Solar System?',
                'option1' => 'Earth',
                'option2' => 'Mars',
                'option3' => 'Jupiter',
                'option4' => 'Venus',
                'correct_answer' => 'Jupiter',
                'subject_id' => 2,
            ],
            [
                'question_text' => 'What is the chemical symbol for water?',
                'option1' => 'O2',
                'option2' => 'H2O',
                'option3' => 'CO2',
                'option4' => 'NaCl',
                'correct_answer' => 'H2O',
                'subject_id' => 3,
            ],
        ]);
    }   

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
