<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashAndFundRequest extends FormRequest
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
            'ac_type.*' => ['nullable'],
            'type_of_fund.*' => [
                'nullable',
                'numeric'
            ],
            'account_no.*' => [
                'nullable',
                'numeric',
            ],
            'bank_name.*' => [
                'nullable',
                'string',
                'max:60',
            ],
            'closing_balance.*' => [
                'nullable',
                'numeric',
            ],
        ];
    }
}
