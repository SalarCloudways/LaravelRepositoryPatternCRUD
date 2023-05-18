<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'post_title' => $this->title,
            'post_body' => $this->body,
            'author_name' => $this->name,
            'author_email' => $this->email,
            'author_github' => $this->github,
            'author_twitter' => $this->twitter
        ];
    }
}
