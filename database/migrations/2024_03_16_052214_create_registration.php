<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 30)->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->string('password')->nullable(false);
            $table->string('gender', 6)->nullable(false);
            $table->bigInteger('mobile')->nullable(false);
            $table->string('hobbies')->nullable(false);
            $table->string('profile_picture')->nullable(false);
            $table->string('role')->nullable(false)->default('User');
            $table->string('status')->nullable(false)->default('Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
