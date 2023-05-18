<?php
namespace App\Repositories\Interfaces;

Interface PostsInterface{
    
    //Get All Posts
    public function allposts();

    //Get All Posts by Same Author
    public function allPostsByAuthor($authorID);

    //Get Single Post by ID
    public function postById($post);

    //Create Post
    public function createPost($data);

    //Delete Post
    public function deletePost($post);

    //Update Post
    public function updatePost($post, $data);
}