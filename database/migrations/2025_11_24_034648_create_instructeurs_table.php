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
        Schema::create('instructeurs', function (Blueprint $table) {
            $table->id();

            // Informations personnelles
            $table->string('first_name_fr');
            $table->string('first_name_en')->nullable();
            $table->string('first_name_ar')->nullable();
            $table->string('last_name_fr');
            $table->string('last_name_en')->nullable();
            $table->string('last_name_ar')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('bio_fr')->nullable();
            $table->text('bio_en')->nullable();
            $table->text('bio_ar')->nullable();

            // Photo de profil
            $table->string('avatar')->nullable(); // path storage
            $table->string('cv')->nullable(); // path storage

            // Adresse pour les cours physiques
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            // Informations professionnelles
            $table->string('specialty_fr')->nullable(); // ex: Fitness, Yoga, Informatique
            $table->string('specialty_en')->nullable(); // ex: Fitness, Yoga, Informatique
            $table->string('specialty_ar')->nullable(); // ex: Fitness, Yoga, Informatique
            $table->integer('experience_years')->default(0);

            // Réseaux sociaux
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();

            // Statut
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructeurs');
    }
};
