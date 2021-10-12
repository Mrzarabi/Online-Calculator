<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'nullable|string|min:3|max:50',
            'family' => 'nullable|string|min:3|max:50',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,svg,gif',
            'address' => 'nullable|string|min:3|max:150',
            'phone' => 'nullable|string|min:3|max:30',
        ];
    }
}
