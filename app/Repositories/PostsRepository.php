<?php

namespace App\Repositories;

use App\Models\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Repositories\Interfaces\PostsInterface;

class PostsRepository implements PostsInterface
{
    //Get All posts
    public function allposts(){

        $result = Posts::select('posts.id as id',
        'posts.title',
        'posts.body',
        'authors.id as author_id',
        'authors.name as name',
        'authors.email',
        'authors.twitter',
        'authors.github')->join('authors', 'posts.author_id', '=', 'authors.id')->get();
        return $result;
    }

    //Get All posts by same Author
    public function allPostsByAuthor($authorID){

        $result = Posts::select('*')->join('authors', 'posts.author_id', '=', 'authors.id')->where('posts.author_id', $authorID)->get();
        return $result;
    }

    //Get Single Post by ID
    public function postById($post){

        $result = Posts::select('*')->join('authors', 'posts.author_id', '=', 'authors.id')->where('posts.id', $post['id'])->first();
        return $result;
    }

    //Create Post
    public function createPost($data){   

        $newPost = Posts::create($data->all());
        return $this->postById($newPost);
    }

    //Delete Post
    public function deletePost($post){
        $post->delete();
        return "Post Delete Successfully";
    }

    //Update Post
    public function updatePost($post, $data){
        $post->update($data->all());
        return $this->postById($post);
    }
}