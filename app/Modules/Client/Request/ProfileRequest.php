<?php

namespace App\Modules\Client\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the client is authorized to make this request.
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
            'hair_length' => 'required|string',
            'hair_status' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string',
            'hair_color' => 'required|string',
            'hair_density' => 'required|string',
            'hair_last_operation' => 'nullable|string',
        ];
    }
}


