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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr');
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slug_fr')->unique();
            $table->string('slug_en')->nullable()->unique();
            $table->string('slug_ar')->nullable()->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('tags');
    }
};
