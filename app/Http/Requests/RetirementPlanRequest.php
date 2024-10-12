<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetirementPlanRequest extends FormRequest
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
            'contribution_amount.*' => [
                'nullable',
                'numeric',
                'max:30',
            ],

        ];
    }
}