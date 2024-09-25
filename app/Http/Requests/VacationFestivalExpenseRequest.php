<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacationFestivalExpenseRequest extends FormRequest
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
            'local_travel' => [
                'nullable',
                'numeric',
            ],
            'foreign_travel' => [
                'nullable',
                'numeric',
            ],
            'other_entertainment' => [
                'nullable',
                'numeric',
            ],
            'religious_festive_expense' => [
                'nullable',
                'numeric',
            ],
            'anniversary_expense' => [
                'nullable',
                'numeric',
            ],
            'birthday_expense' => [
                'nullable',
                'numeric',
            ]
        ];
    }
}
