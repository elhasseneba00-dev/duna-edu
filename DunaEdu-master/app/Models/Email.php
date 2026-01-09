<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
}
