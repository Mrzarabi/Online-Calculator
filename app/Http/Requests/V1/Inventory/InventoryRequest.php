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
            'paypal_inventory' => 'nullable|string|max:255',
            'cash_inventory' => 'nullable|string|max:255',
            'perfect_money_inventory' => 'nullable|string|max:255',
            'web_money_inventory' => 'nullable|string|max:255',
            'tether_inventory' => 'nullable|string|max:255',
        ];
    }
}
