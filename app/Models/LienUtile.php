<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LienUtile extends Model
{
    protected $table = 'liens_utiles';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
}
