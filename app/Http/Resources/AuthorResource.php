<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'github' => $this->github,
            'twitter' => $this->twitter,
            'books' => $this->books->count() > 0 ? BookResource::collection($this->books) : 'No Books Found',
        ];
    }
}
