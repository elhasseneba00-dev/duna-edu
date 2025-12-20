<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonie extends Model
{
    protected $fillable = [
        'auteur_name','auteur_role_fr','auteur_role_en','auteur_role_ar',
        'photo_url','content_fr','content_en','content_ar','rating','is_featured'
    ];
}
