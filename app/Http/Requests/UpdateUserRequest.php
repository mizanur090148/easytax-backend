<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'age' => 'required|integer',
            'nid' => 'required|string|max:50',
            'passport_no' => 'nullable|string|max:50',
            'email' => 'required|email|max:255',
            'bangla_boboborsho_allowance' => 'required|numeric',
            'interest_receivable_on_provident_fund' => 'required|numeric',
            'allowable_exemption' => 'required|numeric',
            'disabilities' => 'nullable',
            'disability_details' => 'nullable|string',
            'freedom_fighter' => 'nullable',
            'freedom_fighter_details' => 'nullable|string',
            'phone_no' => 'required|string|max:20',
            'mobile' => 'required|string|max:20',
            'present_address' => 'required|string',
            'present_city' => 'required|string|max:255',
            'present_post_code' => 'required|string|max:20',
            'present_country' => 'required|string|max:255',
            'permanent_address' => 'required|string',
            'permanent_city' => 'required|string|max:255',
            'permanent_post_code' => 'required|string|max:20',
            'permanent_country' => 'required|string|max:255',
            'etin_number' => 'nullable|string|max:50',
            'circle_id' => 'nullable|max:50',
            'zone_id' => 'nullable|max:50',
            'tax_payer_status' => 'nullable|string|max:50',
            'residential_status' => 'nullable|string|max:50',
            'tax_payer_location_id' => 'nullable|max:50',
            'old_tin' => 'nullable|string|max:50',
            'old_circle_id' => 'nullable',
            'old_zone_id' => 'nullable',
            'marital_status' => 'nullable|max:50',
            'spouse_name' => 'nullable|string|max:255',
            'etin_spouse' => 'nullable|string|max:50',
            'no_dependent_children' => 'nullable|integer',
            'nid_spouse' => 'nullable|string|max:50',
            'children_disabled' => 'nullable|boolean',
            'children_disable_details' => 'nullable|string',
            'fathers_name' => 'nullable|string|max:255',
            'fathers_etin' => 'nullable|string|max:50',
            'mothers_name' => 'nullable|string|max:255',
            'mothers_etin' => 'nullable|string|max:50',
            'profession' => 'nullable|string|max:255',
            'type_of_profession' => 'nullable|string|max:255',
            'employee_id' => 'nullable|string|max:50',
            'name_of_employer' => 'nullable|string|max:255',
            'bin' => 'nullable|string|max:50',
            'etin_business' => 'nullable|string|max:50',
            'office_address' => 'nullable|string',
            'office_city' => 'nullable|string|max:255',
            'office_post_code' => 'nullable|string|max:20',
            'office_country' => 'nullable|string|max:255',
        ];
    }
}
