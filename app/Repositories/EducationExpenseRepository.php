<?php


namespace App\Repositories;

use App\Repositories\Interfaces\EducationExpenseRepositoryInterface;
use App\Models\EducationExpense;

class EducationExpenseRepository extends BaseRepository implements EducationExpenseRepositoryInterface
{

    /**
     * EducationExpenseRepository constructor.
     * @param EducationExpense $model
     */
    public function __construct(EducationExpense $model)
    {
        parent::__construct($model);
    }
}