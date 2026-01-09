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
        Schema::create('inscription_formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apprenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->enum('statut', ['en_attente', 'valide', 'annule'])->default('en_attente');
            $table->boolean('is_paye')->default(false);
            $table->decimal('montant', 10, 2)->nullable();
            $table->string('mode_paiement')->nullable();
            $table->string('reference_paiement')->nullable()->index();
            $table->timestamp('date_inscription')->useCurrent();
            $table->timestamp('date_validation')->nullable();
            $table->timestamp('date_annulation')->nullable();
            $table->decimal('progression', 5, 2)->default(0);
            $table->decimal('note_finale', 5, 2)->nullable();
            $table->boolean('certifie')->default(false);
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription_courses');
    }
};
