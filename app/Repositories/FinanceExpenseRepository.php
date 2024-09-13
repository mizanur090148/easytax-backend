<?php


namespace App\Repositories;

use App\Repositories\Interfaces\FinanceExpenseRepositoryInterface;
use App\Models\FinanceExpense;

class FinanceExpenseRepository extends BaseRepository implements FinanceExpenseRepositoryInterface
{

    /**
     * FinanceExpenseRepository constructor.
     * @param FinanceExpense $model
     */
    public function __construct(FinanceExpense $model)
    {
        parent::__construct($model);
    }
}