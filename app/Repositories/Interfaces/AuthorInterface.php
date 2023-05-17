<?php
namespace App\Repositories\Interfaces;

Interface AuthorInterface{
    
    public function allAuthors();
    public function createAuthors($data);
    public function updateAuthor($data, $id);
}