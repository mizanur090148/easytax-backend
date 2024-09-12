<?php


namespace App\Repositories;

use App\Repositories\Interfaces\SelfAndFamilyExpenseRepositoryInterface;
use App\Models\SelfAndFamilyExpense;

class SelfAndFamilyExpenseRepository extends BaseRepository implements SelfAndFamilyExpenseRepositoryInterface
{

    /**
     * AccountRepository constructor.
     * @param Account $model
     */
    public function __construct(SelfAndFamilyExpense $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function storeOrUpdate(array $data)
    {
    	$result = []; 
    	foreach ($data as $item) {
	    	if (!empty($item['id'])) {
		        $result[] = tap($this->getModel()->where('id', $item['id']))->update($item)->first();
		    } else {
		        $result[] = $this->getModel()->create($item);
		    }
		}
		return $result;
    }
}