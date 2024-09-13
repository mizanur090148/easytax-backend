<?php


namespace App\Repositories;

use App\Repositories\Interfaces\SelfFamilyExpenseRepositoryInterface;
use App\Models\SelfAndFamilyExpense;

class SelfFamilyExpenseRepository extends BaseRepository implements SelfFamilyExpenseRepositoryInterface
{

    /**
     * AccountRepository constructor.
     * @param Account $model
     */
    public function __construct(SelfAndFamilyExpense $model)
    {
        parent::__construct($model);
    }
}