<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('benefices', function (Blueprint $table) {
            $table->id();
            $table->string('text_fr');
            $table->string('text_en')->nullable();
            $table->string('text_ar')->nullable();
            $table->integer('order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('benefices');
    }
};
