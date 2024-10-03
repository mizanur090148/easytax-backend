<?php


namespace App\Repositories;

use App\Models\OtherInvestment;
use App\Repositories\Interfaces\OtherInvestmentRepositoryInterface;

class OtherInvestmentRepository extends BaseRepository implements OtherInvestmentRepositoryInterface
{
    public function __construct(OtherInvestment $model)
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
