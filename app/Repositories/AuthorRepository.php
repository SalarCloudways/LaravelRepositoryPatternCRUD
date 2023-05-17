<?php

namespace App\Repositories;

use App\Models\Author;
use App\Http\Resources\AuthorResource;
use Illuminate\Support\Facades\Response;
use App\Repositories\Interfaces\AuthorInterface;

class AuthorRepository implements AuthorInterface
{

    //Show All Authors
    public function allAuthors()
    {
        return AuthorResource::collection(Author::all());
    }

    //Create New Author
    public function createAuthors($data)
    {
        return new AuthorResource(Author::create($data->all()));
    }

    //Update an Author
    public function updateAuthor($data, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($data->all());

        return new AuthorResource($author);
    }

    //Delete an Author
    public function deleteAuthor($author){

        $author->delete();
        return Response("Author Deleted Successfully", 200);
    }

    //Show Single Author
    public function singleAuthor($author){
        $singleAuthor = $author;
        return new AuthorResource($singleAuthor);
    }
}