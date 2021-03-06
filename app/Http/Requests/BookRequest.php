<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'action' => 'required|string',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'publisher' => 'required|string|max:100',
            'language' => 'required|integer|exists:languages,id',
            'description' => 'required|string|max:300',
            'genres' => 'required',
            'topics' => 'required',
            'image' => 'required_if:action,create|mimes:jpeg,jpg,png'
        ];
    }
}
