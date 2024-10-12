<?php


namespace App\Repositories\Settings;

use App\Repositories\Interfaces\Settings\CircleRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Settings\Circle;

class CircleRepository extends BaseRepository implements CircleRepositoryInterface
{

    /**
     * CircleRepository constructor.
     * @param Account $model
     */
    public function __construct(Circle $model)
    {
        parent::__construct($model);
    }
}
