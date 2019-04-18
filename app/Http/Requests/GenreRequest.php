<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'title' => 'required|string|max:100|unique:genres,title',
            'description' => 'nullable|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.unique' => 'This title already exists'
        ];
    }
}
