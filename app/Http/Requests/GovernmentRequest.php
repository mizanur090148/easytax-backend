<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GovernmentRequest extends FormRequest
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
        $request =  [
            'user_id' => ['required'],
            'salary_income' => ['nullable','array'],
            'salary_income.basic_salary' => [
                'nullable',
                'numeric',
            ],
            'salary_income.house_rent_allowance' => [
                'nullable',
                'numeric',
            ],
            'salary_income.basic_salary' => [
                'nullable',
                'numeric'
            ],
            'salary_income.house_rent_allowance' => [
                'nullable',
                'numeric'
            ],
            'salary_income.conveyance_allowance' => [
                'nullable',
                'numeric'
            ],
            'salary_income.festival_bonus' => [
                'nullable',
                'numeric'
            ],
            'salary_income.bangla_noboborsho_allowance' => [
                'nullable',
                'numeric'
            ],
            'salary_income.interest_receivable_on_provident_fund' => [
                'nullable',
                'numeric'
            ],
            'salary_income.advance_due_salary' => [
                'nullable',
                'numeric'
            ],
            'salary_income.leave_allowance' => [
                'nullable',
                'numeric'
            ],
            'salary_income.honorarium_reward' => [
                'nullable',
                'numeric'
            ],
            'salary_income.overtime_allowance' => [
                'nullable',
                'numeric'
            ],
            'salary_income.lump_sum_grant' => [
                'nullable',
                'numeric'
            ],
            'salary_income.gratuity' => [
                'nullable',
                'numeric'
            ],
            'salary_income.any_other_allowance' => [
                'nullable',
                'numeric'
            ],

            // Capital gain
            'capital_gain.asset_id' => [
                'nullable'
            ],
            'salary_income.land_sale_price' => [
                'nullable',
                'numeric'
            ],
            'salary_income.land_cost' => [
                'nullable',
                'numeric'
            ],
            'salary_income.land_tax_deduction' => [
                'nullable',
                'numeric'
            ],
            'capital_gain.share_id' => [
                'nullable'
            ],
            'salary_income.share_sale_price' => [
                'nullable',
                'numeric'
            ],
            'salary_income.share_cost' => [
                'nullable',
                'numeric'
            ],
            'salary_income.share_tax_deduction' => [
                'nullable',
                'numeric'
            ],
            'capital_gain.any_other_id' => [
                'nullable'
            ],
            'salary_income.any_other_sale_price' => [
                'nullable',
                'numeric'
            ],
            'salary_income.any_other_cost' => [
                'nullable',
                'numeric'
            ],
            'salary_income.any_other_tax_deduction' => [
                'nullable',
                'numeric'
            ]
        ];
        return $request;
    }
}
