<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('liens_utiles', function (Blueprint $table) {
            $table->id();
            $table->string('titre');          // Titre du lien
            $table->string('url');            // URL du lien
            $table->string('type')->nullable(); // Type ou catégorie (ex: PDF, site externe, interne)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('liens_utiles');
    }
};
