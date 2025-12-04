<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTag extends Model
{
    protected $table = 'course_tags';

    protected $fillable = [
        'course_id', 'tag_id'
    ];
}
