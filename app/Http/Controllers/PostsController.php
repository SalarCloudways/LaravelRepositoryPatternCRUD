<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Http\Resources\PostsResource;
use App\Repositories\Interfaces\PostsInterface;

class PostsController extends Controller
{

    private $postsRepository;

    public function __construct(PostsInterface $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    //Show All Posts
    public function allposts(){
        
        $allPosts = $this->postsRepository->allposts();
        return Response(PostsResource::collection($allPosts), 200);
    }

    //Show All Posts By Same Author
    public function allPostsByAuthor($authorID){

        $postByAuthor = $this->postsRepository->allPostsByAuthor($authorID);
        return Response(PostsResource::collection($postByAuthor), 200);
    }

    //Get Single Post By ID
    public function postById(Posts $post){

        $singlePost = $this->postsRepository->postById($post);
        return Response(new PostsResource($singlePost), 200);
    }

    //Create Post
    public function createPost(PostsRequest $request){

        $createPost = $this->postsRepository->createPost($request);
        return Response(new PostsResource($createPost), 200);
    }

    //Delete Post
    public function deletePost(Posts $post){

        $deletePost = $this->postsRepository->deletePost($post);
        return Response($deletePost, 200);
    }

    //Update Post By ID
    public function updatePost(Posts $post, PostsRequest $request){

        $updatePost = $this->postsRepository->updatePost($post, $request);
        return Response(new PostsResource($updatePost), 200);
    }
}
