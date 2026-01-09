<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carriere extends Model
{
    protected $fillable = [
        'titre_fr','titre_en','titre_ar','slug_fr','slug_en','slug_ar',
        'department_fr','department_en','department_ar',
        'location_fr','location_en','location_ar',
        'type','description_fr','description_en','description_ar',
        'is_active','published_at'
    ];

    public function candidats() {
        return $this->hasMany(Candidature::class);
    }
}
