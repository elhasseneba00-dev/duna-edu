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
        Schema::create('carrieres', function (Blueprint $table) {
            $table->id();
            $table->string('titre_fr');
            $table->string('titre_en')->nullable();
            $table->string('titre_ar')->nullable();
            $table->string('slug_fr')->unique();
            $table->string('slug_en')->nullable()->unique();
            $table->string('slug_ar')->nullable()->unique();
            $table->string('department_fr')->nullable();
            $table->string('department_en')->nullable();
            $table->string('department_ar')->nullable();
            $table->string('location_fr')->nullable();
            $table->string('location_en')->nullable();
            $table->string('location_ar')->nullable();
            $table->enum('type', ['full_time','part_time','contract','internship'])->default('full_time');
            $table->longText('description_fr')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrieres');
    }
};
