<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'github', 'twitter'
    ];

    public static $rules = [
        'name' => 'required | max:255',
        'email' => 'required | email',
        'authorID' => 'regex:/^[0-9]*$/',
    ];
}
