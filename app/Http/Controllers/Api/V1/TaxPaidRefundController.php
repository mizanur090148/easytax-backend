<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxPaidRefundRequest;
use App\Repositories\Interfaces\TaxPaidRefundRepositoryInterface;
use DB;
use Illuminate\Http\JsonResponse;
use JsonResponse4;

class TaxPaidRefundController extends Controller
{
    /**
     * @var TaxPaidRefundRepositoryInterface
     */
    protected $repository;

    /**
     * TaxPaidRefundController constructor.
     * @param TaxPaidRefundRepositoryInterface $repository
     */
    public function __construct(TaxPaidRefundRepositoryInterface $repository)
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
     * @param TaxPaidRefundRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(TaxPaidRefundRequest $request)
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
     * @param TaxPaidRefundRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(TaxPaidRefundRequest $request)
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
