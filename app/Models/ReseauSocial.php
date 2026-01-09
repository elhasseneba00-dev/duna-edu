<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReseauSocial extends Model
{
    protected $table = 'reseaux_sociaux';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
}
