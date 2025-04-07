<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id', 50)->primary();
            $table->string('email', 100)->unique();
            $table->string('first_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100);
            $table->timestamps();
        });

        // Insert default students
        DB::table('students')->insert([
            [
                'student_id' => '00001',
                'email' => 'student1@email.com',
                'first_name' => 'John',
                'middle_name' => 'A.',
                'last_name' => 'Doe',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'student_id' => '00002',
                'email' => 'student2@email.com',
                'first_name' => 'Jane',
                'middle_name' => 'B.',
                'last_name' => 'Smith',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'student_id' => '00003',
                'email' => 'student3@email.com',
                'first_name' => 'Mark',
                'middle_name' => null,
                'last_name' => 'Johnson',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    public function down() {
        Schema::dropIfExists('students');
    }
};
