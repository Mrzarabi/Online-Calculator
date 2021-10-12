<?php

namespace App\Http\Requests\V1\AboutUs;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'link_whatsapp' => 'nullable|string',
            'link_telegram' => 'nullable|string',
            'link_instagram' => 'nullable|string',
            'link_gmail' => 'nullable|string',
            'link_skype' => 'nullable|string',
            'logo' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
        ];

    }
}
