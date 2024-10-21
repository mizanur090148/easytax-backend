<?php

namespace App\Http\Controllers\Api\V1\Settings;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Settings\SettingRepositoryInterface;
use App\Http\Requests\Settings\SettingRequest;
use App\Services\DropdownService;
use App\Models\Settings\Setting;
use App\Models\AssetEntries\AgriNonAgriLand;
use App\Models\MotorVehicle;
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
     * @param SettingRequest $request
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
     * @param $id
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

//         Header Change = Capital Gain from Capital Market (Shares)
// Drop down from assets list
// Dropdown from Assets list (Financial Assets) Plus
// Past Return-> Share of Limited Company-> Business 1


        try {
            switch (request('type')) {
                case 'capitalGainFromSaleLand':
                    $result = AgriNonAgriLand::with('propertyType:id,name')
                        ->where('past_return', 1)
                        ->whereIn('type', ['agri', 'non-agri'])
                        ->get()
                        ->pluck('propertyType.name','propertyType.id');
                    break;
                case 'capitalGainFromOtherAssets':
                    $motorVehicles = MotorVehicle::with('propertyType:id,name')
                        ->where('past_return', 1)
                        ->get()
                        ->pluck('propertyType.name','propertyType.id')
                        ->toArray();
                    $jewelleries = Jewellery::with('propertyType:id,name')
                        ->where('past_return', 1)
                        ->get()
                        ->pluck('propertyType.name','propertyType.id')
                        ->toArray();
                    $furnitureEquipments = FurnitureEquipment::with('propertyType:id,name')
                        ->where('past_return', 1)
                        ->get()
                        ->pluck('propertyType.name','propertyType.id')
                        ->toArray();
                    $result = $motorVehicles + $jewelleries + $furnitureEquipments;
                    break;
            }
            return responseSuccess($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }
}
