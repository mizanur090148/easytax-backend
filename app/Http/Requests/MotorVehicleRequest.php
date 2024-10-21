<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotorVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id.*' => [
                'required'
            ],
            'type_id.*' => [
                'required'
            ],
            'capacity_id.*' => [
                'required'
            ],
            'brand.*' => [
                'nullable',
                'string',
                'max:30',
            ],
            'registration_no.*' => [
                'nullable',
                'string',
                'max:30',
            ],
            'cost_with_registration.*' => [
                'nullable',
                'string',
            ],
        ];
    }
}
