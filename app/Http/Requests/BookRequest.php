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
        $id = $this->id ? ',' . $this->id : '';

        return [
            'name' => 'required|min:6|unique:books,name' . $id,
            'description' => 'required',
            'image_url' => 'required|url',
            'published_at' => 'required|date',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
            'total_copies' => 'required|numeric|gt:0',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Field is required',
            'name.min' => 'Minimum length is 6',
            'name.unique' => 'Name already in use',
            'description.required' => 'Field is required',
            'image_url.required' => 'Field is required',
            'image_url.url' => 'Invalid url format',
            'author_id.required' => 'Field is required',
            'author_id.exists' => 'Given author ID doesn\'t exist',
            'genre_id.required' => 'Field is required',
            'genre_id.exists' => 'Given genre ID doesn\'t exist',
            'publisher_id.required' => 'Field is required',
            'publisher_id.exists' => 'Given publisher ID doesn\'t exist',
            'total_copies.required' => 'Field is required',
        ];
    }
}
