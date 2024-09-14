<?php

namespace App\Http\Controllers\Api\V1\AssetEntries;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AgriNonAgriRepositoryInterface;
use App\Http\Requests\AssetEntries\AgriNonAgriLandRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class AgriNonAgriLandController extends Controller
{
    /**
     * @var AgriNonAgriRepositoryInterface
     */
    protected $repository;

    /**
     * AgriNonAgriLandController constructor.
     * @param AgriNonAgriRepositoryInterface $repository
     */
    public function __construct(AgriNonAgriRepositoryInterface $repository)
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
            if (request('type')) {
                $where['type'] = request('type');
            }
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @param AgriNonAgriLandRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(AgriNonAgriLandRequest $request)
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
     * @param AgriNonAgriLandRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(AgriNonAgriLandRequest $request)
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
