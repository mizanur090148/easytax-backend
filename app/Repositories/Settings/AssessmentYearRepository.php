<?php


namespace App\Repositories\Settings;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\Settings\AssessmentYearRepositoryInterface;
use App\Models\Settings\AssessmentYear;
use App\Models\Settings\Setting;

class AssessmentYearRepository extends BaseRepository implements AssessmentYearRepositoryInterface
{

    /**
     * AssessmentYearRepository constructor.
     * @param Account $model
     */
    public function __construct(AssessmentYear $model)
    {
        parent::__construct($model);
    }

    public function incomeAndAssessment()
    {
        $incomeYear = Setting::where(['type' => 'income-year', 'status' => ACTIVE])->first();
        $assessmentYear = Setting::where(['type' => 'assessment-year', 'status' => ACTIVE])->first();
        
        return [
            'incomeYear'       => $incomeYear->name ?? "",
            'assessmentYear'   => $assessmentYear->name ?? ""
        ];
    }
}
