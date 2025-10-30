<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'password' => 'nullable|min:6',
            'password2' => 'same:password',
            'email' => 'email|required|max:255|unique:users,email,' . $request->get('id')
        ];
    }
}
