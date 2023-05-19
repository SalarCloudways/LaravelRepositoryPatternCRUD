<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    // Post with its Author Details
    public function toArray($request)
    {
        
        
        return [
            'post_title' => $this->title,
            'post_body' => $this->body,
            'author_name' => $this->author ? $this->author['name'] : null,
            'author_email' => $this->author ? $this->author['email'] : null,
            'author_github' => $this->author ? $this->author['github'] : null,
            'author_twitter' => $this->author ? $this->author['twitter'] : null,
        ];
    }
}
