<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    const CREATED_AT = 'added';
    const UPDATED_AT = 'updated';
    protected $primaryKey = 'id';

    public function owner()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post', 'blog', 'category');
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'comment_post', 'blog', 'comment');
    }
}
