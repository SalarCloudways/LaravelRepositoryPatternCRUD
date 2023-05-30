<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    //This Request is for validation Author Input
    public function rules(): array
    {
        return [
            'name' => 'required | max:255',
            'email' => 'required | email',
            'authorID' => 'required | integer',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.email' => 'Email is not formatted correctly!',
            'name.required' => 'Name is required!',
            'authorID.regex' => 'authorID is not formatted correctly!'
        ];
    }
}
