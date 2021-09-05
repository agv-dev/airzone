<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function post()
    {
        return $this->belongsToMany(Post::class, 'comment_post', 'comment', 'blog');
    }

    public function writer()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
