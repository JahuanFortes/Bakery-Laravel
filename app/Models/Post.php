<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'active',
        'user_id',
        'category_id'
    ];
    protected $hidden = [
        'active',
        'user_id',
        'category_id'
    ];
//    use HasFactory;
}
