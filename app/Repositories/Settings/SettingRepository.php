<?php


namespace App\Repositories\Settings;

use App\Repositories\Interfaces\Settings\SettingRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Settings\Setting;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{

    /**
     * SettingRepository constructor.
     * @param Account $model
     */
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }
}