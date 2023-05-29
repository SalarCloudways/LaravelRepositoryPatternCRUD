<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\AuthorsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'book_title' => $this->book_title,
            'book_authors' => $this->authors->count() > 0 ? AuthorsResource::collection($this->authors) : 'No Authors Found',
        ];
    }
}
