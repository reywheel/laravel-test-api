<?php

namespace App\Http\Requests\Test;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:4'],
            'is_unidirectional' => ['required', 'boolean'],
            'time_start' => ['required', 'date'],
            'time_finish' => ['required', 'date'],
            'user_id' => ['required', 'integer']
        ];
    }
}
