<?php

use App\Models\Author;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AuthorResource;
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
    Route::put('/authors/{id}', 'updateAuthor');

    //Get Single Author
    Route::get('/authors/{author}', function(Author $author){
        return new AuthorResource($author);
    });

    //Delete Author
    Route::delete('/authors/{author}', function(Author $author){

        $author->delete();
        return Response("Author Deleted Successfully", 200);
    });
});
