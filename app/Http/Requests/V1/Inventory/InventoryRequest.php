<?php

namespace App\Http\Requests\V1\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'paypalInv' => 'nullable|string|max:255',
            'cashInv' => 'nullable|string|max:255',
            'perfectMoneyInv' => 'nullable|string|max:255',
            'webMoneyInv' => 'nullable|string|max:255',
            'tetherInv' => 'nullable|string|max:255',
        ];
    }
}
