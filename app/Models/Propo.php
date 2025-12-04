<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propo extends Model
{
    protected $table = 'propos';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
}
