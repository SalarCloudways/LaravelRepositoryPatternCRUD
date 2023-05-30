<?php
namespace App\Repositories\Interfaces;

Interface BookInterface{
    
    //Get All Books
    public function allbooks();

    //Create Book with Author
    public function createbook($data);
}