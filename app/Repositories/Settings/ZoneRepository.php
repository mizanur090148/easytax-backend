<?php


namespace App\Repositories\Settings;

use App\Repositories\Interfaces\Settings\ZoneRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Settings\Zone;

class ZoneRepository extends BaseRepository implements ZoneRepositoryInterface
{

    /**
     * ZoneRepository constructor.
     * @param Account $model
     */
    public function __construct(Zone $model)
    {
        parent::__construct($model);
    }
}
