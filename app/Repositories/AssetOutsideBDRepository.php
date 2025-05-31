<?php


namespace App\Repositories;

use App\Models\AssetOutsideBD;
use App\Repositories\Interfaces\AssetOutsideBDRepositoryInterface;

class AssetOutsideBDRepository extends BaseRepository implements AssetOutsideBDRepositoryInterface
{

    /**
     * AccountRepository constructor.
     * @param Account $model
     */
    public function __construct(AssetOutsideBD $model)
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
