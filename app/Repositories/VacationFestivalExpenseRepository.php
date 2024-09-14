<?php


namespace App\Repositories;

use App\Repositories\Interfaces\VacationFestivalExpenseRepositoryInterface;
use App\Models\VacationFestivalExpense;

class VacationFestivalExpenseRepository extends BaseRepository implements VacationFestivalExpenseRepositoryInterface
{

    /**
     * VacationFestivalExpenseRepository constructor.
     * @param VacationFestivalExpense $model
     */
    public function __construct(VacationFestivalExpense $model)
    {
        parent::__construct($model);
    }
}