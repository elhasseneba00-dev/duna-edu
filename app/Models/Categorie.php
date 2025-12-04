<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
}
