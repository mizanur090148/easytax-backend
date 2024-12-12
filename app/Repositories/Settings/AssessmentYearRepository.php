<?php


namespace App\Repositories\Settings;

use App\Models\Settings\AssessmentYear;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\Settings\AssessmentYearRepositoryInterface;

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
}
