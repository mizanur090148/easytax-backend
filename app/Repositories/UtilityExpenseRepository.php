<?php


namespace App\Repositories;

use App\Repositories\Interfaces\UtilityExpenseRepositoryInterface;
use App\Models\UtilityExpense;

class UtilityExpenseRepository extends BaseRepository implements UtilityExpenseRepositoryInterface
{

    /**
     * UtilityExpenseRepository constructor.
     * @param UtilityExpense $model
     */
    public function __construct(UtilityExpense $model)
    {
        parent::__construct($model);
    }
}