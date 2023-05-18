<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required | max:255',
            'body' => 'required',
            'author_id' => 'required | regex:/^[0-9]*$/',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post Title is required!',
            'body.required' => 'Post Body is required!',
            'author_id.regex' => 'authorID is not formatted correctly!',
            'author_id.required' => 'authorID is required'
        ];
    }
}
