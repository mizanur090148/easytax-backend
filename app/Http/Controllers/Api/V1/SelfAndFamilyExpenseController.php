<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\SelfAndFamilyExpenseRepositoryInterface;
use App\Http\Requests\SelfAndFamilyExpenseRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class SelfAndFamilyExpenseController extends Controller
{
    /**
     * @varSelfAndFamilyExpenseRepositoryInterface
     */
    protected $repository;

    /**
     *SelfAndFamilyExpenseController constructor.
     * @paramSelfAndFamilyExpenseRepositoryInterface $repository
     */
    public function __construct(SelfAndFamilyExpenseRepositoryInterface $repository)
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
     * @paramSelfAndFamilyExpenseRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(SelfAndFamilyExpenseRequest $request)
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
     * @paramSelfAndFamilyExpenseRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(SelfAndFamilyExpenseRequest $request)
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
