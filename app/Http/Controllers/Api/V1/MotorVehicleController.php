<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\MotorVehicleRepositoryInterface;
use App\Http\Requests\MotorVehicleRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class MotorVehicleController extends Controller
{
    /**
     * @var MotorVehicleRepositoryInterface
     */
    protected $repository;

    /**
     * MotorVehicleController constructor.
     * @param MotorVehicleRepositoryInterface $repository
     */
    public function __construct(MotorVehicleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse|\JsonResponse
     */
    public function index()
    {
        try {
            $where = [
                'user_id' => auth()->id()
            ];
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @param MotorVehicleRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(MotorVehicleRequest $request)
    // {
    //     try {
    //         $inputData = [];
    //         foreach ($request->all() as $data) {
    //             $inputData[] = $data;
    //         }
    //         $result = $this->repository->storeAll($inputData);
    //         return responseCreated($result);
    //     } catch (Exception $e) {
    //         return responseCantProcess($e);
    //     }
    // }

    /**
     * @param MotorVehicleRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(MotorVehicleRequest $request)
    {
        try {
            DB::beginTransaction();
            $result = $this->repository->storeOrUpdate($request->all());
            DB::commit();
            return responsePatched($result);
        } catch (Exception $e) {
            DB::rollBack(); 
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
}
