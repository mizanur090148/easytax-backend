<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\FurnitureEquipmentRepositoryInterface;
use App\Http\Requests\FurnitureEquipmentRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class FurnitureEquipmentController extends Controller
{
    /**
     * @var FurnitureEquipmentRepositoryInterface
     */
    protected $repository;

    /**
     * FurnitureEquipmentController constructor.
     * @param FurnitureEquipmentRepositoryInterface $repository
     */
    public function __construct(FurnitureEquipmentRepositoryInterface $repository)
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
            if (request('past_return')) {
                $where['past_return'] = request('past_return');
            }
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @param FurnitureEquipmentRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(FurnitureEquipmentRequest $request)
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
     * @param FurnitureEquipmentRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(FurnitureEquipmentRequest $request)
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
