<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationExpenseRequest extends FormRequest
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
            'tution_fees' => [
                'nullable',
                'numeric',
            ],
            'exam_fees' => [
                'nullable',
                'numeric',
            ],
            'private_tutor_salary' => [
                'nullable',
                'numeric',
            ],
            'books_periodicals' => [
                'nullable',
                'numeric',
            ],
            'uniform_shoes' => [
                'nullable',
                'numeric',
            ]
        ];
    }
}
