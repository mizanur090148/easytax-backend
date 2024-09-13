<?php


namespace App\Repositories;

use App\Repositories\Interfaces\HousingExpenseRepositoryInterface;
use App\Models\HousingExpense;

class HousingExpenseRepository extends BaseRepository implements HousingExpenseRepositoryInterface
{

    /**
     * HousingExpenseRepository constructor.
     * @param HousingExpense $model
     */
    public function __construct(HousingExpense $model)
    {
        parent::__construct($model);
    }
}