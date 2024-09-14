<?php


namespace App\Repositories;

use App\Repositories\Interfaces\TransportExpenseRepositoryInterface;
use App\Models\TransportExpense;

class TransportExpenseRepository extends BaseRepository implements TransportExpenseRepositoryInterface
{

    /**
     * TransportExpenseRepository constructor.
     * @param TransportExpense $model
     */
    public function __construct(TransportExpense $model)
    {
        parent::__construct($model);
    }
}