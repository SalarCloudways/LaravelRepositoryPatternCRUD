<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Repositories\Interfaces\BookInterface;

class BookRepository implements BookInterface
{
    //Get All Books
    public function allbooks(){

        $result = Book::all();
        return $result;
    }
}