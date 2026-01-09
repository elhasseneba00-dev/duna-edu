<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevisRequest extends Model
{
    protected $table = 'devis_requests';
    protected $fillable= ['company', 'contact_name', 'email', 'telephone', 'project_type', 'budget', 'message'];
}
