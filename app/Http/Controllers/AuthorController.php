<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\AuthorInterface;

class AuthorController extends Controller
{

    private $authorRepository;

    public function __construct(AuthorInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    //Show All Authors
    public function allauthors()
    {
        $allAuthors = $this->authorRepository->allAuthors();
        return Response::json(AuthorResource::collection($allAuthors), 200);
    }

    //Create Authors
    public function createauthor(AuthorRequest $request){

        $addAuthor = $this->authorRepository->createauthors($request);
        return Response::json(new AuthorResource($addAuthor), 200);
    }

    //Update Author
    public function updateAuthor(AuthorRequest $request, Author $author){

        $updateAuthor = $this->authorRepository->updateAuthor($request, $author);
        return Response::json(new AuthorResource($updateAuthor), 200);
    }

    //Delete Author
    public function deleteAuthor(Author $author){

        $deleteAuthor = $this->authorRepository->deleteAuthor($author);
        return Response($deleteAuthor, 200);
    }

    //Show Single Author
    public function singleAuthor(Author $author){

        $singleauthor = $this->authorRepository->singleAuthor($author);
        return Response(new AuthorResource($singleauthor), 200);
    }
}