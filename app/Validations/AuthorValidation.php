<?php

namespace App\Validations;

class AuthorValidation
{
    public static $rules = [
        'name' => 'required | max:255',
        'email' => 'required | email',
        'authorID' => 'regex:/^[0-9]*$/',
    ];
}
