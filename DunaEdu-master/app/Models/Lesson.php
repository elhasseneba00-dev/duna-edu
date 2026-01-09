<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
