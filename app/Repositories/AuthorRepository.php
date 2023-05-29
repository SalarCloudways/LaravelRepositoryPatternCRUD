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
        return Author::all();
    }

    //Create New Author
    public function createAuthors($data)
    {
        return Author::create($data->all());
    }

    //Update an Author
    public function updateAuthor($data, $author)
    {
        $author->update($data->all());
        return $author;
    }

    //Delete an Author
    public function deleteAuthor($author){

        $author->delete();
        return Response("Author Deleted Successfully", 200);
    }

    //Show Single Author
    public function singleAuthor($author){
        $singleAuthor = $author;
        return $singleAuthor;
    }
}