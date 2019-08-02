<?php

namespace App\Modules\Product\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string',
            'image' => 'nullable|image',
            'quantity' => 'required|integer',
            'qr_code' => 'required|string|unique:products,qr_code',
            'min_quantity_available' => 'required|integer',
            'actual_price' => 'required|numeric',
            'final_price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|integer',
        ];
    }
}
