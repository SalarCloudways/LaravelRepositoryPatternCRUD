<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_title', 'book_content'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book');
    }
}
