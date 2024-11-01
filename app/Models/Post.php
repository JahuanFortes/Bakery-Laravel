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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function likes()
//    {
//        return $this->hasMany(User::class, 'post_user');
//    }

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
