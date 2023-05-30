<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();
        $books = Book::all();

        foreach ($authors as $author) {
            $author->books()->attach($books->random(rand(1, 5))->pluck('id'));
        }
    }
}
