<?php


namespace App\Repositories;

use App\Models\ListedSecurities;
use App\Repositories\Interfaces\ListedSecuritiesRepositoryInterface;

class ListedSecuritiesRepository extends BaseRepository implements ListedSecuritiesRepositoryInterface
{
    public function __construct(ListedSecurities $model)
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
