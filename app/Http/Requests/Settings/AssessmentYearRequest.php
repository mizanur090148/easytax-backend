<?php

namespace App\Http\Requests\Settings;

use App\Http\Rules\UniqueCheck;
use App\Models\Settings\TypeOfVehicle;
use Illuminate\Foundation\Http\FormRequest;

class AssessmentYearRequest extends FormRequest
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
            'assessment_year' => [
                'required',
                'max:30',
            ]
        ];
    }
}
