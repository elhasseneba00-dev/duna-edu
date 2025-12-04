<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructeur extends Model
{
    protected $table = 'instructeurs';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
}
