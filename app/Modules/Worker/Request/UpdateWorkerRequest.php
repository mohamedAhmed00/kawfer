<?php

namespace App\Modules\Worker\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkerRequest extends FormRequest
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
            'job_title' => 'required|string',
            'age' => 'required|integer',
            'phone_number' => 'required|numeric',
            'health_certificate_id' => 'nullable|image',
            'national_id' => 'nullable|image',
            'passport_image' => 'nullable|image',
            'passport_expiration_age' => 'required|string',
            'health_certificate_expiration_age' => 'required|string',
            'national_expiration_age' => 'required|string',
        ];
    }
}
