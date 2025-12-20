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
        Schema::create('apprenants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('prenom');
            $table->string('nom');
            $table->string('civilite')->nullable()->comment('M./Mme/Autre');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telephone')->nullable()->index();
            $table->date('date_naissance')->nullable();
            $table->enum('genre', ['masculin', 'feminin'])->default('masculin');
            $table->string('photo_profil')->nullable();
            $table->text('bio')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->default('Mali');
            $table->string('code_postal')->nullable();

            $table->enum('niveau', ['debutant', 'intermediaire', 'avance', 'professionnel'])->default('debutant');

            $table->timestamp('date_inscription')->nullable();
            $table->timestamp('dernier_login_at')->nullable();

            // Tokens
            $table->string('token_verification')->nullable()->index();
            $table->timestamp('token_verification_expires_at')->nullable();
            $table->string('reset_password_token')->nullable()->index();
            $table->timestamp('reset_password_expires_at')->nullable();

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprenants');
    }
};
