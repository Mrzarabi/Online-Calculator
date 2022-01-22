<?php

namespace App\Http\Requests\V1\Form;

use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
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
            'email' => 'required|string|email|max:100|confirmed',
            'contact_email' => 'required|string|email|max:100|confirmed',
            'wallet' => 'required|string|max:255',
            'telegram' => 'nullable|string|max:50',
            'whatsApp' => 'nullable|string|max:50',
            'skype' => 'nullable|string|max:50',
            'extra' => 'nullable|string|max:255',
            'cheack' => 'required|boolean',
            'captcha' => 'required|captcha',

            //* Relations
            'orders.*' => 'required|integer|exists:orders,id' 
        ];
    }
}
