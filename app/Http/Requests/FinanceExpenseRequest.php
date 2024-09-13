<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinanceExpenseRequest extends FormRequest
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
            'institutional_loan' => [
                'nullable',
                'numeric',
            ],
            'non_institutional_loan' => [
                'nullable',
                'numeric',
            ],
            'other_loan' => [
                'nullable',
                'numeric',
            ]
        ];
    }
}
