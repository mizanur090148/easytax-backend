<?php

namespace App\Http\Controllers\Api\V1\investmentCredit;

use App\Http\Controllers\Api\V1\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\FinancialAssetRequest;
use App\Repositories\Interfaces\FinancialAssetRepositoryInterface;
use DB;
use Illuminate\Http\JsonResponse;
use JsonResponse4;

class SavingsPlanController extends Controller
{
    protected $repository;
    public function __construct(FinancialAssetRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
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
    public function destroy($id)
    {
        try {
            return responseDeleted($this->repository->delete($id));
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }
}
