<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Http\Resources\BooksResource;
use App\Repositories\Interfaces\BookInterface;

class BookController extends Controller
{
    private $booksRepository;

    public function __construct(BookInterface $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    public function allbooks(){

        $allbooks = $this->booksRepository->allbooks();
        return Response(BooksResource::collection($allbooks), 200);
    }
}
