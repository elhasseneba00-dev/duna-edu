<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $table = 'telephones';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
}
