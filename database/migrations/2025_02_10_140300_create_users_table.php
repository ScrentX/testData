<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255);
            $table->string('password', 255);
            $table->enum('role', ['admin', 'instructor']);
            $table->timestamp('created_at')->useCurrent();
        });

     
        DB::table("users")->insert([
            [ "username" => "Ken", "password" => Hash::make("123"), "role" => "admin" ],
            [ "username" => "scrent", "password" => Hash::make("1234"), "role" => "instructor" ],
            [ "username" => "screntx", "password" => Hash::make("12345"), "role" => "admin" ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
