<?php


namespace App\Repositories\Settings;

use App\Repositories\Interfaces\Settings\TypeOfVehicleRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Settings\TypeOfVehicle;

class TypeOfVehicleRepository extends BaseRepository implements TypeOfVehicleRepositoryInterface
{

    /**
     * TypeOfVehicleRepository constructor.
     * @param Account $model
     */
    public function __construct(TypeOfVehicle $model)
    {
        parent::__construct($model);
    }
}