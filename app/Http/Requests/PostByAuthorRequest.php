<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostByAuthorRequest extends FormRequest
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

    //This Request is for validating AuthorID Input
    public function rules(): array
    {
        return [
            'author_id' => 'required | integer',
        ];
    }

    public function messages()
    {
        return [
            'author_id.required' => 'authorID is required'
        ];
    }
}
