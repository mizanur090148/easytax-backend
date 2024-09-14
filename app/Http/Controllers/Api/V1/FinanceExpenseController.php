<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\FinanceExpenseRepositoryInterface;
use App\Http\Requests\FinanceExpenseRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class FinanceExpenseController extends Controller
{
    /**
     * @varSelfAndFamilyExpenseRepositoryInterface
     */
    protected $repository;

    /**
     * constructor.
     * @param FinanceExpenseRepositoryInterface $repository
     */
    public function __construct(FinanceExpenseRepositoryInterface $repository)
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
     * @param FinanceExpenseRequest $request
     * @return JsonResponse|JsonResponse4
     */
    public function store(FinanceExpenseRequest $request)
    {
        try {
            $result = $this->repository->store($request->all());
            return responseCreated($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    /**
     * @param FinanceExpenseRequest $request
     * @return \JsonResponse
     */
    public function update($id, FinanceExpenseRequest $request)
    {
        try {
            $result = $this->repository->update($id, $request->all());
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
