<?php


namespace App\Repositories;

use App\Models\LiabilitiesEntry;
use App\Repositories\Interfaces\OtherLiabilitiesRepositoryInterface;

class OtherLiabilitiesRepository extends BaseRepository implements OtherLiabilitiesRepositoryInterface
{

    public function __construct(LiabilitiesEntry $model)
    {
        parent::__construct($model);
    }


    public function storeOrUpdate(array $data)
    {
    	$result = [];
    	foreach ($data as $item) {
            $item = array_merge($item, ['type_of_liabilities_entry' => 'other']);
            if (!empty($item['id'])) {
		        $result[] = tap($this->getModel()->where('id', $item['id']))->update($item)->first();
		    } else {
		        $result[] = $this->getModel()->create($item);
		    }
		}
		return $result;
    }
}
