<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'job_title', 'avatar_path', 'dob', 'phone', 'address', 'email', 'website', 'about_text'
    ];
}
