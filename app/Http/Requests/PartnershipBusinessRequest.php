<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnershipBusinessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'user_id.*' => [
                'required'
            ],

            'name_of_business.*' => [
                'nullable',
                'string',
            ],
            'address.*' => [
                'nullable',
                'string',
            ],
            'business_etin.*' => [
                'nullable',
                'string',
            ],
        ];
    }
}
