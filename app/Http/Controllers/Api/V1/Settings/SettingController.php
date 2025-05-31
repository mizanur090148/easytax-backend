<?php

namespace App\Http\Controllers\Api\V1\Settings;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Settings\SettingRepositoryInterface;
use App\Http\Requests\Settings\SettingRequest;
use App\Services\DropdownService;
use App\Models\Settings\Setting;
use App\Models\AssetEntries\AgriNonAgriLand;
use App\Models\DirectoryShare;
use App\Models\MotorVehicle;
use App\Models\BusinessAsset;
use App\Models\Jewellery;
use App\Models\FurnitureEquipment;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class SettingController extends Controller
{
    /**
     * @var SettingRepositoryInterface
     */
    protected $repository;

    /**
     * SettingController constructor.
     * @param SettingRepositoryInterface $repository
     */
    public function __construct(SettingRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse|\JsonResponse
     */
    public function index()
    {
        try {
            $where = [];
            if (request('type')) {
                $where['type'] = request('type');
            }
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @param SettingRequest $request
     * @return JsonResponse|JsonResponse4
     */
    public function store(SettingRequest $request)
    {
        try {
            $result = $this->repository->store($request->all());
            return responseCreated($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    /**
     * @param $id
     * @param SettingRequest  $request
     * @return JsonResponse
     */
    public function update($id, SettingRequest $request)
    {
        try {
            $result = $this->repository->update($id, $request->validated());
            return responsePatched($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    /**
     *  @param $id
     * @return JsonResponse|\JsonResponse
     */
    public function destroy($id)
    {
        try {
            return responseDeleted($this->repository->delete($id));
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    /**
     * @param DropdownService $service
     * @return JsonResponse
     */
    public function dropdown(DropdownService $service)
    {
        try {
            $data = $service->dropdownData(Setting::class, [], ['id','name'], true);
             return responseSuccess($data);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

     /**
     * @param DropdownService $service
     * @return JsonResponse
     */
    public function complexDropdown()
    {
        try {
            switch (request('type')) {
                case 'capitalGainFromSaleLand':
                    $result = AgriNonAgriLand::join('settings', 'agri_non_agri_lands.property_type_id', '=','settings.id')
                        ->where('agri_non_agri_lands.past_return', 0)
                        ->whereIn('agri_non_agri_lands.type', ['agri', 'non-agri'])
                        ->select('settings.id','settings.name','agri_non_agri_lands.net_value_of_property')
                        ->get();
                case 'saleLand':
                    $result = AgriNonAgriLand::join('settings', 'agri_non_agri_lands.property_type_id', '=','settings.id')
                        ->where('agri_non_agri_lands.past_return', 1)
                        ->select(
                            'settings.id',
                            'settings.name',
                            'settings.type',
                            'agri_non_agri_lands.type as asset_type',
                            'agri_non_agri_lands.net_value_of_property as amount'
                        )->get();
                    break;
                case 'saleShare':
                    $businessAssets = BusinessAsset::where('past_return', 1)
                        ->select(
                            'id',
                            'name_of_business as name',
                            DB::raw('total_assets - closing_liabilities AS amount'),
                            DB::raw('"business" as type')
                        )->get();
                    $directoryShares = DirectoryShare::where('past_return', 1)
                        ->select(
                            'id',
                            'name_of_company as name',
                            DB::raw('
                                (closing_no_of_shares * cost_per_share)
                                + (purchased_no_of_shares * purchased_cost_per_share)
                                - (sold_no_of_shares * sold_cost_per_share)
                                AS amount'
                        ),
                        DB::raw('"marketShare" as type')
                        )
                    ->get();
                    $result = $businessAssets->merge($directoryShares);
                    break;
                case 'otherAssets':
                    $motorVehicles = MotorVehicle::join('settings', 'motor_vehicles.type_id', '=','settings.id')
                        ->where('motor_vehicles.past_return', 1)
                        ->select(
                            'settings.id',
                            'settings.name',
                            'settings.type',
                            'motor_vehicles.cost_with_registration as amount'
                        )->get();
                    $jewelleries = Jewellery::join('settings', 'jewelleries.type_id', '=','settings.id')
                        ->where('jewelleries.past_return', 1)
                        ->select(
                            'settings.id',
                            'settings.name',
                            'settings.type',
                            'jewelleries.closing_value as amount'
                        )->get();
                    $furnitureEquipments = FurnitureEquipment::join('settings', 'furniture_equipments.type_id', '=','settings.id')
                        ->where('furniture_equipments.past_return', 1)
                        ->select(
                            'settings.id',
                            'settings.name',
                            'settings.type',
                            'furniture_equipments.closing_value as amount'
                        )->get();
                    $result = $motorVehicles->merge($jewelleries)->merge($furnitureEquipments);
                    break;
            }
            return responseSuccess($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }
}
