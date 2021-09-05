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
}
