<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This migration creates the `companies` table to store all information
     * about an online education company that will be displayed on the website.
     * It is intentionally flexible: some fields are JSON to allow future
     * extensions (multiple services, social links, pricing tiers, etc.).
     */
    public function up(): void
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->id();

            // Basic identification
            $table->string('name_fr');
            $table->string('slogan_fr');
            $table->string('name_en')->nullable();
            $table->string('slogan_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slogan_ar')->nullable();
            // $table->string('legal_name')->nullable();

            // Registration & fiscal
            // $table->string('registration_number')->nullable();
            // $table->string('tax_id')->nullable();

            // Contact
            $table->string('email')->nullable();
            $table->string('email_alt')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_alt')->nullable();
            $table->string('website')->nullable();

            // Address components (nullable to allow remote-only companies)
            $table->string('street_address_fr')->nullable();
            $table->string('postal_code_fr')->nullable();
            $table->string('city_fr')->nullable();
            $table->string('country_fr')->nullable();

            $table->string('street_address_en')->nullable();
            $table->string('postal_code_en')->nullable();
            $table->string('city_en')->nullable();
            $table->string('country_en')->nullable();

            $table->string('street_address_ar')->nullable();
            $table->string('postal_code_ar')->nullable();
            $table->string('city_ar')->nullable();
            $table->string('country_ar')->nullable();

            // Media
            $table->string('logo_path')->nullable();
            $table->string('cover_image_path')->nullable();

            // Soft delete + timestamps
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societes');
    }
};

/*
Example seed snippet (to put in a seeder) :

use Illuminate\Support\Str;
use App\Models\Company;

Company::create([
    'name' => 'École en Ligne Exemple',
    'slug' => Str::slug('École en Ligne Exemple'),
    'legal_name' => 'Ecole Exemple SARL',
    'email' => 'contact@example.com',
    'phone' => '+223 70 00 00 00',
    'website' => 'https://example.edu',
    'description' => 'Plateforme d\'enseignement en ligne proposant des cours, des certifications et un accompagnement pédagogique.',
    'services' => json_encode([
        ['code' => 'cours', 'title' => 'Cours en ligne', 'description' => 'Cours structurés avec vidéos et quiz'],
        ['code' => 'mentorat', 'title' => 'Mentorat', 'description' => 'Accompagnement personnalisé']
    ]),
    'pricing' => json_encode(['tiers' => [['name' => 'Basique','price' => 0], ['name' => 'Pro','price' => 4999]]]),
    'currency' => 'XOF',
    'default_language' => 'fr',
    'timezone' => 'Africa/Bamako',
]);

Notes:
- Les champs JSON permettent d'étendre sans modifier la structure.
- Adaptez les longueurs et les types (string/text) selon vos besoins.
- Vous pouvez créer un modèle Company avec des casts :
    protected $casts = [
        'services' => 'array',
        'pricing' => 'array',
        'social_links' => 'array',
        'contact_person' => 'array',
    ];
*/
