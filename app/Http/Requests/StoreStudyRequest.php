<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Adjust if you want to implement authorization logic
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
            'name' => 'required|string|max:255',
            'tag' => 'nullable|string|max:100',
            'priority' => 'nullable|integer|in:0,1,2',
            'status' => 'nullable|integer|in:0,1,2',
            'due_date' => 'nullable|string|max:255',
        ];
    }
}
