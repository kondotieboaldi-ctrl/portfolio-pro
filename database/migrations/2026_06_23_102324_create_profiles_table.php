<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {

            $table->id();

            $table->string('fullname');

            $table->string('professional_title');

            $table->string('photo')->nullable();

            $table->string('email');

            $table->string('phone')->nullable();

            $table->string('linkedin')->nullable();

            $table->string('github')->nullable();

            $table->string('facebook')->nullable();

            $table->string('cv')->nullable();

            $table->longText('about_me')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
