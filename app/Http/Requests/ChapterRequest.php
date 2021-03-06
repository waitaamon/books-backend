<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
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
            'book_id' => 'required_if:action,create|integer|exists:books,id',
            'title' => 'required|string|max:255',
            'order' => 'required|integer',
            'is_live' => 'required|boolean',
            'sub_title' => 'required|string|max:255',
            'body' => 'required|string'
        ];
    }
}
