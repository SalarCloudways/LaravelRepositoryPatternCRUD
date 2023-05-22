<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'author_id', 'image'
    ];

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author_id'); 
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
