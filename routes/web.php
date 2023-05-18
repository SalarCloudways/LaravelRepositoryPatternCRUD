<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AuthorResource;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(AuthorController::class)->group(function () {

    //Get All Authors
    Route::get('/authors', 'allauthors');

    //Create new Author
    Route::post('/authors', 'createauthor');

    //Update an Author
    Route::put('/authors/{author}', 'updateAuthor');

    //Get Single Author
    Route::get('/authors/{author}', 'singleAuthor');

    //Delete Author
    Route::delete('/authors/{author}', 'deleteAuthor');
});

Route::controller(PostsController::class)->group(function (){

    //Get All Posts
    Route::get('/posts', 'allposts');

    //Get All Posts by AuthorID
    Route::get('/posts/author={authorID}', 'allPostsByAuthor');

    //Get Single Post by ID
    Route::get('/posts/{post}', 'postById');

    //Create new Post
    Route::post('/posts', 'createPost');

    //Update Post by ID
    Route::put('/posts/{post}', 'updatePost');

    //Delete Post by ID
    Route::delete('/posts/{post}', 'deletePost');

});
