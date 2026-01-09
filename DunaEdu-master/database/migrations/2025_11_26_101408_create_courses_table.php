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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title_fr');
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('slug_fr')->unique();
            $table->string('slug_en')->nullable()->unique();
            $table->string('slug_ar')->nullable()->unique();
            $table->text('summary_fr')->nullable();
            $table->text('summary_en')->nullable();
            $table->text('summary_ar')->nullable();
            $table->longText('description_fr')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->foreignId('instructeur_id')->nullable()->constrained('instructeurs')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->decimal('price', 10, 2)->default(0);
            $table->enum('price_type_fr', ['gratuit','paiement unique','abonnement'])->default('gratuit');
            $table->enum('price_type_en', ['free','one_time','subscription'])->default('free');
            $table->enum('price_type_ar', ['مجاني','دفع مرة واحدة','اشتراك'])->default('مجاني');
            $table->integer('duration_minutes_fr')->nullable();
            $table->integer('duration_minutes_en')->nullable();
            $table->integer('duration_minutes_ar')->nullable();
            $table->string('level_fr')->nullable();
            $table->string('level_en')->nullable();
            $table->string('level_ar')->nullable();
            $table->string('language', 10)->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
