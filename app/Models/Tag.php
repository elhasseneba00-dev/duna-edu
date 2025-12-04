<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
     // Tag → Courses (Many to Many)
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_tags')
                    ->withTimestamps();
    }
}
