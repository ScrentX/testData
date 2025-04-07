<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('subject_id');
            $table->string('subject_name', 50);
        });

     
        DB::table('subjects')->insert([
            ['subject_name' => 'Mathematics'],
            ['subject_name' => 'Science'],
            ['subject_name' => 'English'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
