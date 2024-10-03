<?php

namespace App\Http\Controllers\Api\V1\investmentCredit;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherInvestmentRequest;
use App\Repositories\Interfaces\OtherInvestmentRepositoryInterface;
use DB;
use JsonResponse4;

class OtherInvestmentController extends Controller
{

    protected $repository;


    public function __construct(OtherInvestmentRepositoryInterface $repository)
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

    public function store(OtherInvestmentRequest $request)
    {
        try {
            $result = $this->repository->storeOrUpdate($request->all());
            return responseCreated($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    public function update($id, OtherInvestmentRequest $request)
    {
        try {
            $result = $this->repository->update($id, $request->all());
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
