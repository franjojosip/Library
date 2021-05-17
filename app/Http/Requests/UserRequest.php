<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'min:4|required|unique:users,name' . $id,
            'role_id' => 'required|exists:roles,id',
            'book_limit' => 'required|numeric|gt:0',
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
            'name.min' => 'Minimum length is 4',
            'name.unique' => 'Name already in use',
            'role.required' => 'Field is required',
            'role.exists' => 'Given role ID doesn\'t exist',
            'book_limit.required' => 'Field is required',
        ];
    }
}
