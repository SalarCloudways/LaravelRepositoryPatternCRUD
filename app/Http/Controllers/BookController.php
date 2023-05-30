<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Resources\BooksResource;
use Illuminate\Http\Request;
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

    public function createbook(Request $request){

        $createbook = $this->booksRepository->createbook($request);
        return Response(new BooksResource($createbook), 200);
    }
}
