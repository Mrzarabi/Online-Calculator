<?php

namespace App\Http\Requests\V1\Clearing;

use Illuminate\Foundation\Http\FormRequest;

class ClearingRequest extends FormRequest
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
            'title' => 'nullable|string|min:3|max:50',
            'body' => 'nullable|string',
            'clear' => 'nullable',
            
            //Relation
            'orders.*' => 'nullable|integer|exists:orders,id',
        ];


    }
}
