<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'tag'       => 'required|string|max:100',
            'priority'  => 'required|integer|in:0,1,2',
            'status'    => 'required|integer|in:0,1,2',
            'due_date'  => 'required|string|max:255',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Please enter a name.',
    //         'tag.required' => 'Please enter a tag.',
    //         'priority.required' => 'Please select a priority level.',
    //         'status.required' => 'Please select a status.',
    //         'due_date.required' => 'Please enter a due date.',
    //     ];
    // }
}
