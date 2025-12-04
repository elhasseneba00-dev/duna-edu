<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Societe extends Model
{
    use SoftDeletes;

    protected $table = 'societes';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
}
