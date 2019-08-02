<?php

namespace App\Modules\Schedule\Request;

use Illuminate\Foundation\Http\FormRequest;

class ReservationLaterRequest extends FormRequest
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
            'operation_date' => 'required|date',
            'client_id' => 'required|string',
            'worker_id' => 'required|string',
            'operation_id' => 'required|string',
            'operation_type_measure_id' => 'required|string',
            'operation_discount_id' => 'nullable|string',
            'total' => 'required|string',
        ];
    }
}
