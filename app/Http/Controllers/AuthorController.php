<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
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

    public function allauthors()
    {
        $allAuthors = $this->authorRepository->allAuthors();
        return Response::json($allAuthors, 200);
    }

    public function createauthor(Request $request){

        $validator = Validator::make($request->all(), Author::$rules);

        if ($validator->fails()) {
            return Response($validator->errors(), 400);
        }

        $addAuthor = $this->authorRepository->createauthors($request);
        return Response::json($addAuthor, 200);
    }

    public function updateAuthor(Request $request, $id){

        $request['authorID'] = $id;

        $validator = Validator::make($request->all(), Author::$rules);

        if ($validator->fails()) {
            return Response($validator->errors(), 400);
        }
        
        $updateAuthor = $this->authorRepository->updateAuthor($request, $id);
        return Response::json($updateAuthor, 200);
    }
}
