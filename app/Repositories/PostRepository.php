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
    public function allPostsByAuthor($author){

        $result = Post::with('author')->where('author_id', $author['author_id'])->get();
        return $result;
    }

    //Create Post
    public function createPost($data){  

        if($data->hasFile('image')) {
            $data['image'] = $data->file('image')->store('postImages', 'public');
        }

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