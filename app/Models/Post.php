<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//
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
    use HasFactory;
}
