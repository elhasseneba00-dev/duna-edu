<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reseaux_sociaux', function (Blueprint $table) {
            $table->id();
            $table->string('nom');      // ex: Facebook, Twitter
            $table->string('url');      // URL du profil ou page
            $table->string('icone')->nullable(); // nom de l'icône ou classe CSS
            $table->timestamps();
        });

        // Insertion directe des réseaux sociaux
        DB::table('reseaux_sociaux')->insert([
            ['nom' => 'Facebook', 'url' => 'https://www.facebook.com/tonprofil', 'icone' => 'fab fa-facebook', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Twitter', 'url' => 'https://twitter.com/tonprofil', 'icone' => 'fab fa-twitter', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Instagram', 'url' => 'https://www.instagram.com/tonprofil', 'icone' => 'fab fa-instagram', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/tonprofil', 'icone' => 'fab fa-linkedin', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'TikTok', 'url' => 'https://www.tiktok.com/@tonprofil', 'icone' => 'fab fa-tiktok', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'YouTube', 'url' => 'https://www.youtube.com/channel/tonprofil', 'icone' => 'fab fa-youtube', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Pinterest', 'url' => 'https://www.pinterest.com/tonprofil', 'icone' => 'fab fa-pinterest', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Snapchat', 'url' => 'https://www.snapchat.com/add/tonprofil', 'icone' => 'fab fa-snapchat', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'WhatsApp', 'url' => 'https://wa.me/tonnumero', 'icone' => 'fab fa-whatsapp', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Telegram', 'url' => 'https://t.me/tonprofil', 'icone' => 'fab fa-telegram', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Discord', 'url' => 'https://discord.gg/tonserveur', 'icone' => 'fab fa-discord', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Reddit', 'url' => 'https://www.reddit.com/user/tonprofil', 'icone' => 'fab fa-reddit', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'GitHub', 'url' => 'https://github.com/tonprofil', 'icone' => 'fab fa-github', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseaux_sociaux');
    }
};
