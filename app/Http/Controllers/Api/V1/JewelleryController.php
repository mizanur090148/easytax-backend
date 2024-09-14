<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\JewelleryRepositoryInterface;
use App\Http\Requests\JewelleryRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class JewelleryController extends Controller
{
    /**
     * @varJewelleryRepositoryInterface
     */
    protected $repository;

    /**
     *JewelleryController constructor.
     * @paramJewelleryRepositoryInterface $repository
     */
    public function __construct(JewelleryRepositoryInterface $repository)
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
     * @paramJewelleryRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(JewelleryRequest $request)
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
     * @paramJewelleryRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(JewelleryRequest $request)
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
