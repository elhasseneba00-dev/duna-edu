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
        Schema::create('testimonies', function (Blueprint $table) {
            $table->id();
            $table->string('auteur_name');
            $table->string('auteur_role_fr')->nullable();
            $table->string('auteur_role_en')->nullable();
            $table->string('auteur_role_ar')->nullable();
            $table->string('photo_url')->nullable();
            $table->text('content_fr');
            $table->text('content_en')->nullable();
            $table->text('content_ar')->nullable();
            $table->decimal('rating', 2, 1)->default(5.0);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonies');
    }
};
