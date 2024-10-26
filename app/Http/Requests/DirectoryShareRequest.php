<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectoryShareRequest extends FormRequest
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
            'name_of_company.*' => [
                'required',
                'string',
                'max:100'
            ],
            'incorporation_no.*' => [
                'required',
                'string',
                'max:50'
            ],
            'closing_capital.*' => [
                'nullable',
                'numeric',
            ],
            'closing_no_of_shares.*' => [
                'nullable',
                'numeric',
            ],
            'cost_per_share.*' => [
                'nullable',
                'numeric',
            ],
            'total_closing_value.*' => [
                'nullable',
                'numeric',
            ]
        ];
    }
}
