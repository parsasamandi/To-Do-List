<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'priority'  => 'required|integer|in:0,1,2',
            'sub_tag'  => 'required',
            'status'    => 'required|integer|in:0,1,2',
            'due_date'  => 'required|string|max:255',
        ];
    }

}
