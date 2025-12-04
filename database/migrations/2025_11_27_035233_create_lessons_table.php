<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
            $table->string('title_fr');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->longText('content_fr')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_ar')->nullable();
            $table->enum('content_type', ['video', 'article', 'quiz', 'assignment', 'resource'])->default('article');
            $table->string('video_url')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('duration_seconds')->nullable();
            $table->boolean('is_locked')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
};
