<?php
namespace App\Repositories\Interfaces;

Interface PostInterface{
    
    //Get All Posts
    public function allposts();

    //Get All Posts by Same Author
    public function allPostsByAuthor($authorID);

    //Create Post
    public function createPost($data);

    //Delete Post
    public function deletePost($post);

    //Update Post
    public function updatePost($post, $data);
}