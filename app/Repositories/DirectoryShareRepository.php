<?php


namespace App\Repositories;

use App\Repositories\Interfaces\DirectoryShareRepositoryInterface;
use App\Models\DirectoryShare;

class DirectoryShareRepository extends BaseRepository implements DirectoryShareRepositoryInterface
{

    /**
     * DirectoryShareRepository constructor.
     * @param DirectoryShare $model
     */
    public function __construct(DirectoryShare $model)
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