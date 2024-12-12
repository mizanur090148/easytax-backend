<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Rules\UniqueCheck;
use App\Models\Settings\Setting;

class SettingRequest extends FormRequest
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
            'name' => [
                'required',
                'max:30',
                new UniqueCheck(Setting::class)
            ],
            'status' => [
                'nullable',
                'integer',
                'in:0,1', // Ensures status can only be 0 or 1
                function ($attribute, $value, $fail) {
                    if ($value == 1 && $this->input('type') === 'assessment-year') {
                        $existingActive = Setting::where('type', 'assessment-year')
                            ->where('status', 1)
                            ->where('id', '!=', $this->route('id')) // Ignore current record during update
                            ->exists();

                        if ($existingActive) {
                            $fail('Only one "assessment-year" can have status 1.');
                        }
                    }
                }
            ],
        ];
    }
}
