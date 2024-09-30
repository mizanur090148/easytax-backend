<?php

namespace App\Http\Controllers\Api\V1\investmentCredit;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\SavingsPlanRepositoryInterface;
use App\Http\Requests\SavingsPlanRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;
use Illuminate\Http\Request;

class SavingsPlanController extends Controller
{

    protected $repository;


    public function __construct(SavingsPlanRepositoryInterface $repository)
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

    public function store(SavingsPlanRequest $request)
    {
        try {
            $result = $this->repository->storeOrUpdate($request->all());
            return responseCreated($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    public function update($id, SavingsPlanRequest $request)
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
