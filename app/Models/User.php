<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function posts()
    {
        return $this->hasMany(Post::class, 'user', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user', 'id');
    }

    public function writers()
    {
        return $this->hasMany(User::class, 'id', 'id')
            ->join('posts', 'user.id', '=', 'user.id')
            ->join('comment_post', 'comment_post.blog', '=', 'posts.id')
            ->join('comments', 'comments.id', '=', 'comment_post.comment')
            ->where('posts.user', '=', $this->id)->select('comments.user')->distinct();
    }
}
