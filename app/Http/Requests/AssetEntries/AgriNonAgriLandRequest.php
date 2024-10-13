<?php

namespace App\Http\Requests\AssetEntries;

use Illuminate\Foundation\Http\FormRequest;

class AgriNonAgriLandRequest extends FormRequest
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
            'property_type_id.*' => ['required'],
            'date_of_purchase.*' => [
                'nullable',
                'date',
            ],
            'renovation_deployment.*' => [
                'nullable',
                'string',
                'max:30',
            ],
            'sale_of_portion.*' => [
                'nullable',
                'numeric',
            ],
            'cost_of_sale_portion.*' => [
                'nullable',
                'numeric',
            ],
        ];
    }
}
