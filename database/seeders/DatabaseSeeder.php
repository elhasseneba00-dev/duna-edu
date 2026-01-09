<?php

namespace Database\Seeders;

use App\Models\Carriere;
use App\Models\Testimonie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Societe;
use App\Models\Propo;
use App\Models\Categorie;
use App\Models\Course;
use App\Models\Instructeur;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('fr_FR');

        // 1) Société (DunaEdu)
        Societe::firstOrCreate(
            ['name_fr' => 'DunaEdu'],
            [
                'slogan_fr' => 'L’éducation centralisée, accessible à tous.',
                'name_en' => 'DunaEdu',
                'slogan_en' => 'Centralized education, accessible to all.',
                'name_ar' => 'دونا إدو',
                'slogan_ar' => 'التعليم المركزي متاح للجميع.',
                'email' => 'contact@dunaedu.com',
                'phone' => '+223 92 27 86 30',
                'street_address_fr' => 'Hamdallaye ACI 2000',
                'postal_code_fr' => '3000',
                'city_fr' => 'Bamako',
                'country_fr' => 'Mali',
                'logo_path' => 'societes/logos/logo-dunaedu.webp',
                'cover_image_path' => 'societes/covers/cover-dunaedu.webp',
            ]
        );

        // 2) À propos
        Propo::firstOrCreate(
            ['title_fr' => 'Former les futurs leaders grâce à une éducation de qualité'],
            [
                'subtitle_fr' => 'À propos de nous',
                'description_fr' => 'Découvrez des milliers de formations de haute qualité conçues par des professionnels du secteur...',
                'years_experience_fr' => 8,
                'expert_instructors_fr' => 50,
                'students_worldwide_fr' => 15000,
                'mission_fr' => "Permettre à chaque apprenant d'atteindre son plein potentiel grâce à une éducation moderne et accessible.",
                'vision_fr' => "Devenir la référence de l’éducation en ligne en Afrique francophone d’ici 2030.",
                'image' => 'propos/about-main.webp',
                'image_1' => 'propos/team-1.webp',
                'image_2' => 'propos/classroom.webp',
                'image_3' => 'propos/certification.webp',
            ]
        );

        // 3) Bénéfices
        $benefices = [
            "Options et horaires d'apprentissage flexibles",
            "Des formateurs expérimentés dans le secteur",
            "Contenu de cours interactif et stimulant",
            "Orientation professionnelle et soutien au placement",
            "Plateforme d'apprentissage en ligne de pointe",
        ];
        foreach ($benefices as $index => $text) {
            DB::table('benefices')->updateOrInsert(
                ['id' => $index + 1],
                [
                    'text_fr' => $text,
                    'text_en' => $text,
                    'text_ar' => $text,
                    'order' => $index,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // 4) Catégories
        $categoriesData = [
            ['name_fr' => 'Informatique', 'name_en' => 'Computer Science', 'name_ar' => 'علوم الحاسوب', 'icon' => 'bi bi-laptop'],
            ['name_fr' => 'Marketing Digital', 'name_en' => 'Digital Marketing', 'name_ar' => 'التسويق الرقمي', 'icon' => 'bi bi-graph-up-arrow'],
            ['name_fr' => 'Design UI/UX', 'name_en' => 'UI/UX Design', 'name_ar' => 'تصميم واجهة وتجربة المستخدم', 'icon' => 'bi bi-palette'],
            ['name_fr' => 'Développement Mobile', 'name_en' => 'Mobile Development', 'name_ar' => 'تطوير التطبيقات المتنقلة', 'icon' => 'bi bi-phone'],
            ['name_fr' => 'Data Science', 'name_en' => 'Data Science', 'name_ar' => 'علوم البيانات', 'icon' => 'bi bi-bar-chart-line'],
        ];
        foreach ($categoriesData as $cat) {
            Categorie::firstOrCreate(['name_fr' => $cat['name_fr']], $cat);
        }

        // 5) Tags
        $tagsData = ['Programming', 'JavaScript', 'React', 'UX', 'SEO'];
        foreach ($tagsData as $name) {
            Tag::firstOrCreate(
                ['slug_fr' => Str::slug($name)],
                ['name_fr' => $name]
            );
        }

        // 6) Instructeurs
        $instructeur = Instructeur::firstOrCreate(
            ['email' => 'harouna@dunaedu.com'],
            [
                'first_name_fr' => 'Harouna',
                'last_name_fr' => 'Ongoiba',
                'phone' => '+223 92 27 86 30',
                'bio_fr' => 'Développeur Full Stack et formateur passionné avec plus de 8 ans d’expérience.',
                'specialty_fr' => 'Développement Web & Mobile',
                'experience_years' => 8,
                'avatar' => 'instructeurs/avatar/harouna.webp',
                'is_active' => true,
            ]
        );
        $instructeur2 = Instructeur::firstOrCreate(
            ['email' => 'sarah.johnson@dunaedu.com'],
            [
                'first_name_fr' => 'Sarah',
                'last_name_fr' => 'Johnson',
                'bio_fr' => 'Experte en marketing digital.',
                'specialty_fr' => 'Marketing Digital',
                'experience_years' => 8,
                'is_active' => true,
            ]
        );

        // 7) Cours (1 exemple + 12 générés)
        $informatique = Categorie::where('name_fr', 'Informatique')->first();

        $course1 = Course::firstOrCreate(
            ['slug_fr' => 'advanced-javascript-development'],
            [
                'title_fr' => 'Advanced JavaScript Development',
                'summary_fr' => 'Maîtrisez JavaScript moderne : ES6+, async/await, API REST, POO avancée...',
                'price' => 0,
                'price_type_fr' => 'gratuit',
                'category_id' => $informatique?->id,
                'instructeur_id' => $instructeur->id,
                'duration_minutes_fr' => 720, // 12h
                'level_fr' => 'Avancé',
                'language' => 'fr',
                'thumbnail' => 'courses/advanced-js.webp',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'order' => 1,
            ]
        );

        $courseTitles = [
            'Initiation à Laravel 11', 'React & Next.js de A à Z', 'Flutter : Apps iOS & Android',
            'UI/UX Design avec Figma', 'Python pour Data Science', 'SEO & Google Analytics',
            'WordPress Professionnel', 'Docker & Kubernetes', 'Cybersécurité Éthique',
            'Machine Learning avec TensorFlow', 'Anglais Professionnel', 'Entrepreneuriat Digital'
        ];
        $categoryIds = Categorie::pluck('id')->all();

        foreach ($courseTitles as $i => $title) {
            Course::firstOrCreate(
                ['slug_fr' => Str::slug($title)],
                [
                    'title_fr' => $title,
                    'summary_fr' => $faker->paragraph(3),
                    'price' => $faker->randomElement([0, 25000, 45000, 89000]),
                    'price_type_fr' => $faker->randomElement(['gratuit', 'paiement unique']),
                    'category_id' => $faker->randomElement($categoryIds),
                    'instructeur_id' => $instructeur->id,
                    'duration_minutes_fr' => $faker->numberBetween(120, 1800), // 2h à 30h
                    'level_fr' => $faker->randomElement(['Débutant', 'Intermédiaire', 'Avancé']),
                    'language' => 'fr',
                    'thumbnail' => 'courses/course-' . ($i + 2) . '.webp',
                    'is_published' => true,
                    'published_at' => now()->subDays(rand(1, 90)),
                    'order' => $i + 2,
                ]
            );
        }

        // 8) Modules & Leçons pour le premier cours
        $moduleId = DB::table('modules')
            ->updateOrInsert(
                ['course_id' => $course1->id, 'title_fr' => 'Frontend Development'],
                [
                    'description_fr' => 'React, JavaScript ES6+, HTML5 & CSS3',
                    'order' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

        // Récupération id du module créé/présent
        $moduleRowId = DB::table('modules')
            ->where('course_id', $course1->id)
            ->where('title_fr', 'Frontend Development')
            ->value('id');

        if (!DB::table('lessons')->where('module_id', $moduleRowId)->where('title_fr', 'Prérequis du cours')->exists()) {
            DB::table('lessons')->insert([
                'module_id' => $moduleRowId,
                'title_fr' => 'Prérequis du cours',
                'content_fr' => "Compréhension basique de HTML et CSS\nConnaissance des fondamentaux JavaScript\nOrdinateur avec connexion internet\nÉditeur de code installé",
                'content_type' => 'article',
                'attachment' => 'lessons/requirements-dunaedu.pdf',
                'duration_seconds' => 300,
                'order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 9) Réseaux sociaux
        $socials = [
            ['nom' => 'Facebook', 'url' => 'https://facebook.com/dunaedu', 'icone' => 'fab fa-facebook'],
            ['nom' => 'Instagram', 'url' => 'https://instagram.com/dunaedu', 'icone' => 'fab fa-instagram'],
            ['nom' => 'LinkedIn', 'url' => 'https://linkedin.com/company/dunaedu', 'icone' => 'fab fa-linkedin'],
            ['nom' => 'YouTube', 'url' => 'https://youtube.com/@dunaedu', 'icone' => 'fab fa-youtube'],
            ['nom' => 'TikTok', 'url' => 'https://tiktok.com/@dunaedu', 'icone' => 'fab fa-tiktok'],
        ];
        foreach ($socials as $social) {
            DB::table('reseaux_sociaux')->updateOrInsert(
                ['nom' => $social['nom']],
                [
                    'url' => $social['url'],
                    'icone' => $social['icone'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }

        // 10) Exemple supplémentaire avec tags reliés
        $marketingCatId = Categorie::where('name_fr', 'Marketing Digital')->value('id') ?? $informatique?->id;
        $tagIds = Tag::whereIn('slug_fr', ['javascript', 'ux', 'seo'])->pluck('id');

        $course = Course::firstOrCreate(
            ['slug_fr' => Str::slug('Fondamentaux du Marketing Digital')],
            [
                'title_fr' => 'Fondamentaux du Marketing Digital',
                'summary_fr' => 'Initiez-vous aux leviers du marketing digital.',
                'description_fr' => 'Programme structuré avec projets pratiques.',
                'instructeur_id' => $instructeur2->id,
                'category_id' => $marketingCatId,
                'price' => 149.00,
                'price_type_fr' => 'paiement unique',
                'duration_minutes_fr' => 8 * 60, // 8h
                'level_fr' => 'Débutant',
                'language' => 'fr',
                'is_published' => true,
                'published_at' => now(),
                'order' => 100,
            ]
        );
        if ($tagIds->count()) {
            $course->tags()->syncWithoutDetaching($tagIds->all());
        }

        // 11) Apprenants (selon ta migration)
        // Table: apprenants avec colonnes (uuid, prenom, nom, email, password, telephone, genre, pays, niveau, etc.)
        $genderMap = ['masculin', 'feminin'];
        $levels = ['debutant', 'intermediaire', 'avance', 'professionnel'];

        // Crée 20 apprenants fictifs
        for ($i = 0; $i < 20; $i++) {
            DB::table('apprenants')->updateOrInsert(
                ['email' => $faker->unique()->safeEmail()],
                [
                    'uuid' => (string) Str::uuid(),
                    'prenom' => $faker->firstName,
                    'nom' => $faker->lastName,
                    'civilite' => $faker->randomElement(['M.', 'Mme', 'Autre']),
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'telephone' => $faker->optional()->phoneNumber,
                    'date_naissance' => $faker->optional()->date('Y-m-d', '2005-12-31'),
                    'genre' => $faker->randomElement($genderMap),
                    'photo_profil' => null,
                    'bio' => $faker->optional()->paragraph(),
                    'adresse' => $faker->optional()->streetAddress,
                    'ville' => $faker->optional()->city,
                    'pays' => 'Mali',
                    'code_postal' => $faker->optional()->postcode,
                    'niveau' => $faker->randomElement($levels),
                    'date_inscription' => now()->subDays(rand(0, 90)),
                    'dernier_login_at' => now()->subDays(rand(0, 15)),
                    'token_verification' => null,
                    'token_verification_expires_at' => null,
                    'reset_password_token' => null,
                    'reset_password_expires_at' => null,
                    'remember_token' => Str::random(10),
                    'deleted_at' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        Testimonie::create([
            'auteur_name' => 'Jane Smith',
            'auteur_role_fr' => 'Étudiante',
            'content_fr' => 'Excellentes formations, pédagogie claire et efficace.',
            'rating' => 4.8,
            'is_featured' => true,
        ]);

        Carriere::create([
            'titre_fr' => 'Chargé(e) de communication',
            'slug_fr' => Str::slug('Chargé(e) de communication'),
            'department_fr' => 'Marketing',
            'location_fr' => 'Bamako, Mali',
            'type' => 'full_time',
            'description_fr' => 'Participation aux campagnes, gestion des réseaux sociaux.',
            'is_active' => true,
            'published_at' => now(),
        ]);
    }
}
