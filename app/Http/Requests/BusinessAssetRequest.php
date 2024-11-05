<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessAssetRequest extends FormRequest
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
            'name_of_business.*' => [
                'required',
                'string',
                'max:100'
            ],
            'type_of_business.*' => [
                'required',
                'string',
                'max:50'
            ],
            'address.*' => [
                'required',
                'string',
                'max:150'
            ],
            'total_assets.*' => [
                'nullable',
                'numeric',
            ],
            'closing_liabilities.*' => [
                'nullable',
                'numeric',
            ],
            // 'closing_capital.*' => [
            //     'nullable',
            //     'numeric',
            // ]
        ];
    }
}
