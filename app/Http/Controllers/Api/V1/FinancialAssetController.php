<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\FinancialAssetRepositoryInterface;
use App\Http\Requests\FinancialAssetRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class FinancialAssetController extends Controller
{
    /**
     * @var FinancialAssetRepositoryInterface
     */
    protected $repository;

    /**
     * FinancialAssetController constructor.
     * @param FinancialAssetRepositoryInterface $repository
     */
    public function __construct(FinancialAssetRepositoryInterface $repository)
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
     * @param FinancialAssetRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(FinancialAssetRequest $request)
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
     * @param FinancialAssetRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(FinancialAssetRequest $request)
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
