<?php


namespace App\Repositories;

use App\Models\InvestmentCreditSavings;
use App\Repositories\Interfaces\SavingsPlanRepositoryInterface;

class SavingsPlanRepository extends BaseRepository implements SavingsPlanRepositoryInterface
{
    public function __construct(InvestmentCreditSavings $model)
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
