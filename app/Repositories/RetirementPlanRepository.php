<?php


namespace App\Repositories;

use App\Models\RetirementPlan;
use App\Repositories\Interfaces\RetirementPlanRepositoryInterface;

class RetirementPlanRepository extends BaseRepository implements RetirementPlanRepositoryInterface
{
    public function __construct(RetirementPlan $model)
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
