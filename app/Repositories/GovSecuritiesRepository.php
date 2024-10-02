<?php


namespace App\Repositories;

use App\Models\GovSecurities;
use App\Repositories\Interfaces\GovSecuritiesRepositoryInterface;

class GovSecuritiesRepository extends BaseRepository implements GovSecuritiesRepositoryInterface
{
    public function __construct(GovSecurities $model)
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
