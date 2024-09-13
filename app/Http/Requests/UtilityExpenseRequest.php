<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilityExpenseRequest extends FormRequest
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
            'electricity_bill' => [
                'nullable',
                'numeric',
            ],
            'gas_bill' => [
                'nullable',
                'numeric',
            ],
            'water_bill' => [
                'nullable',
                'numeric',
            ],
            'telephone_bill' => [
                'nullable',
                'numeric',
            ],
            'mobile_bill' => [
                'nullable',
                'numeric',
            ],
            'internet_bill' => [
                'nullable',
                'numeric',
            ]
        ];
    }
}
