<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeEntryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'nullable|string|max:255',
            'total_income' => 'nullable|numeric',
            'income_year' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'total_head_income' => 'nullable|numeric',
            'total_tax' => 'nullable|numeric',
            'assessment_year' => 'nullable|string|max:255',
            'salary_income' => 'nullable|boolean',
            'employment_type' => 'nullable|string|max:255',
            'basic_salary' => 'nullable|numeric',
            'allowable_exemption_basic_salary' => 'nullable|numeric',
            'taxable_amount_basic_salary' => 'nullable|numeric',
            'house_rent_allowance' => 'nullable|numeric',
            'allowable_exemption_house_rent' => 'nullable|numeric',
            'taxable_amount_house_rent' => 'nullable|numeric',
            'medical_allowance' => 'nullable|numeric',
            'allowable_exemption_medical' => 'nullable|numeric',
            'taxable_amount_medical' => 'nullable|numeric',
            'conveyance_allowance' => 'nullable|numeric',
            'allowable_exemption_conveyance' => 'nullable|numeric',
            'taxable_amount_conveyance' => 'nullable|numeric',
            'festival_bonus' => 'nullable|numeric',
            'allowable_exemption_festival' => 'nullable|numeric',
            'taxable_amount_festival' => 'nullable|numeric',
            'bangla_noboborsho_allowance' => 'nullable|numeric',
            'allowable_exemption_bangla_noboborsho' => 'nullable|numeric',
            'taxable_amount_bangla_noboborsho' => 'nullable|numeric',
            'interest_receivable_on_provident_fund' => 'nullable|numeric',
            'allowable_exemption_provident_fund' => 'nullable|numeric',
            'taxable_amount_provident_fund' => 'nullable|numeric',
            'advance_due_salary' => 'nullable|numeric',
            'allowable_exemption_advance_due' => 'nullable|numeric',
            'taxable_amount_advance_due' => 'nullable|numeric',
            'special_allowance' => 'nullable|numeric',
            'allowable_exemption_special' => 'nullable|numeric',
            'taxable_amount_special' => 'nullable|numeric',
            'support_staff_allowance' => 'nullable|numeric',
            'allowable_exemption_support_staff' => 'nullable|numeric',
            'taxable_amount_support_staff' => 'nullable|numeric',
            'leave_allowance' => 'nullable|numeric',
            'allowable_exemption_leave' => 'nullable|numeric',
            'taxable_amount_leave' => 'nullable|numeric',
            'honorarium_reward' => 'nullable|numeric',
            'allowable_exemption_honorarium' => 'nullable|numeric',
            'taxable_amount_honorarium' => 'nullable|numeric',
            'overtime_allowance' => 'nullable|numeric',
            'allowable_exemption_overtime' => 'nullable|numeric',
            'taxable_amount_overtime' => 'nullable|numeric',
            'lump_sum_grant' => 'nullable|numeric',
            'allowable_exemption_lump_sum' => 'nullable|numeric',
            'taxable_amount_lump_sum' => 'nullable|numeric',
            'gratuity' => 'nullable|numeric',
            'allowable_exemption_gratuity' => 'nullable|numeric',
            'taxable_amount_gratuity' => 'nullable|numeric',
            'any_other_allowance' => 'nullable|numeric',
            'allowable_exemption_any_other' => 'nullable|numeric',
            'taxable_amount_any_other' => 'nullable|numeric',
            'total_allowable_exemption' => 'nullable|numeric',
            'total_taxable_amount' => 'nullable|numeric'
        ];
    }
}
