<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransportExpenseRequest extends FormRequest
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
            'user_id' => ['required'],
            'conveyance_payments' => [
                'nullable',
                'numeric',
            ],
            'fuel_cost' => [
                'nullable',
                'numeric',
            ],
            'repair_maintenance' => [
                'nullable',
                'numeric',
            ],
            'fitness_renewals' => [
                'nullable',
                'numeric',
            ],
            'driver_salary' => [
                'nullable',
                'numeric',
            ],
            'garage_rent' => [
                'nullable',
                'numeric',
            ],
            'ait_paid_on_car_renewal' => [
                'nullable',
                'numeric',
            ]
        ];
    }
}
