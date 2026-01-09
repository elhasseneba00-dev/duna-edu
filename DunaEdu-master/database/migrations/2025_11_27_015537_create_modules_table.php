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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('title_fr');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('modules');
    }
};
