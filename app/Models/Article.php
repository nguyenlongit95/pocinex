<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'info',
        'description',
        'time_public',
        'image',
    ];
}
