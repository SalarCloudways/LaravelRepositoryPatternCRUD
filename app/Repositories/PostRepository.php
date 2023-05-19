<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Repositories\Interfaces\PostInterface;

class PostRepository implements PostInterface
{
    //Get All posts
    public function allposts(){

        $result = Post::all();
        return $result;
    }

    //Get All posts by same Author
    public function allPostsByAuthor($authorID){

        $result = Post::with('author')->where('author_id', $authorID)->get();
        return $result;
    }

    //Create Post
    public function createPost($data){   

        $newPost = Post::create($data->all());
        return $newPost;
    }

    //Delete Post
    public function deletePost($post){
        $post->delete();
        return true;
    }

    //Update Post
    public function updatePost($post, $data){
        $post->update($data->all());
        return $post;
    }
}