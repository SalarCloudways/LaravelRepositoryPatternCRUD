<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostByAuthorRequest;
use App\Repositories\Interfaces\PostInterface;

class PostController extends Controller
{

    private $postsRepository;

    public function __construct(PostInterface $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    //Show All Posts
    public function allposts(){
        
        $allPosts = $this->postsRepository->allposts();
        return Response(PostResource::collection($allPosts), 200);
    }

    //Show All Posts By Same Author
    public function allPostsByAuthor(PostByAuthorRequest $request){

        $postByAuthor = $this->postsRepository->allPostsByAuthor($request);
        return Response(PostResource::collection($postByAuthor), 200);
    }

    //Get Single Post By ID
    public function postById(Post $post){

        return Response(new PostResource($post), 200);
    }

    //Create Post
    public function createPost(PostRequest $request){

        $createPost = $this->postsRepository->createPost($request);
        return Response(new PostResource($createPost), 200);
    }

    //Delete Post
    public function deletePost(Post $post){

        $deletePost = $this->postsRepository->deletePost($post);
        return Response($deletePost === true ? "Post Delete Successfully" : "Post Not Deleted Successfully", 200);
    }

    //Update Post By ID
    public function updatePost(Post $post, PostRequest $request){

        $updatePost = $this->postsRepository->updatePost($post, $request);
        return Response(new PostResource($updatePost), 200);
    }
}
