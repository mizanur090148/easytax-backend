<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavingsPlanRequest extends FormRequest
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
            'user_id.*' => ['required'],
            'type.*' => ['required'],
            'policy_number.*' => [
                'nullable',
                'numeric',
                'max:30',
            ],
            'insured_amount.*' => [
                'nullable',
                'numeric',
                'max:30',
            ],
            'current_year_amount.*' => [
                'nullable',
                'numeric',
            ],
        ];
    }
}
