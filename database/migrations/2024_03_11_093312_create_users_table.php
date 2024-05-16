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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();

///////

            $table->string('course')->default('BS-XX'); // Add a column for the user's course
            $table->string('address')->default('XXX'); // Add a column for the user's address
            $table->string('religion')->default('XXX'); // Add a column for the user's religion
            $table->string('birthday')->default('XXX'); // Add a column for the user's birthday
            $table->string('contact_number')->default('XXX');
            $table->string('profile_image')->default('profile.png');// Add a nullable column for the profile image
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
