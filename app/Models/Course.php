<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $guarded = [];

    protected $casts = [
        // Add JSON casts later if needed
    ];
     // Course → Category (Many to One)
    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function instructeur()
    {
        return $this->belongsTo(Instructeur::class);
    }

    // Course → Tags (Many to Many)
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tags')
                    ->withTimestamps();
    }

    // Course → Modules (One to Many)
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
