<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Storage;
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
            'post_image' => Storage::url($this->image),
            'author_name' => $this->author->name,
            'author_email' => $this->author->email,
            'author_github' => $this->author->github,
            'author_twitter' => $this->author->twitter,
            'post_comments' => $this->comments->count() > 0 ? CommentResource::collection($this->comments) : 'No comments found',

        ];
    }
}
