<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GovSecuritiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'user_id.*' => ['required'],
            'type.*' => ['required'],
            'paid_amount.*' => [
                'nullable',
                'numeric',
                'max:30',
            ],
            'scheme_name.*' => [
                'nullable',
                'string',
                'max:30',
            ],
            'account_no.*' => [
                'nullable',
                'string',
            ],
        ];
    }
}
