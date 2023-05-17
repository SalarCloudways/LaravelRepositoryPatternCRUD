<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Validations\AuthorValidation;
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
        return Response::json($allAuthors, 200);
    }

    //Create Authors
    public function createauthor(Request $request){

        $validator = Validator::make($request->all(), AuthorValidation::$rules);

        if ($validator->fails()) {
            return Response($validator->errors(), 400);
        }

        $addAuthor = $this->authorRepository->createauthors($request);
        return Response::json($addAuthor, 200);
    }

    //Update Author
    public function updateAuthor(Request $request, $id){

        $request['authorID'] = $id;

        $validator = Validator::make($request->all(), AuthorValidation::$rules);

        if ($validator->fails()) {
            return Response($validator->errors(), 400);
        }

        $updateAuthor = $this->authorRepository->updateAuthor($request, $id);
        return Response::json($updateAuthor, 200);
    }

    //Delete Author
    public function deleteAuthor(Author $author){

        $deleteAuthor = $this->authorRepository->deleteAuthor($author);

        return Response($deleteAuthor);
    }

    //Show Single Author
    public function singleAuthor(Author $author){

        $singleauthor = $this->authorRepository->singleAuthor($author);

        return Response($singleauthor);
    }
}
