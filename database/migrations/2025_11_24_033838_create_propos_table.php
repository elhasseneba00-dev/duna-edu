<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('propos', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle_fr');
            $table->string('title_fr');
            $table->longText('description_fr')->nullable();
            $table->integer('years_experience_fr')->default(0);
            $table->integer('expert_instructors_fr')->default(0);
            $table->integer('students_worldwide_fr')->default(0);
            $table->text('mission_fr')->nullable();
            $table->text('vision_fr')->nullable();
            $table->text('value_fr')->nullable();

            $table->string('subtitle_en')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('description_en')->nullable();
            $table->integer('years_experience_en')->default(0);
            $table->integer('expert_instructors_en')->default(0);
            $table->integer('students_worldwide_en')->default(0);
            $table->text('mission_en')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('value_en')->nullable();

            $table->string('subtitle_ar')->nullable();
            $table->string('title_ar')->nullable();
            $table->longText('description_ar')->nullable();
            $table->integer('years_experience_ar')->default(0);
            $table->integer('expert_instructors_ar')->default(0);
            $table->integer('students_worldwide_ar')->default(0);
            $table->text('mission_ar')->nullable();
            $table->text('vision_ar')->nullable();
            $table->text('value_ar')->nullable();
            // NEW : image principale
            $table->string('image')->nullable();

            // NEW : 3 images
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propos');
    }
};
