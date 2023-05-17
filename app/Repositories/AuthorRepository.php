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
        $author = new AuthorResource(Author::findOrFail($id));
        $author->update($data->all());

        return $author;
    }
}