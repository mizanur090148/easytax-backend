<?php

namespace App\Http\Controllers\Api\V1\investmentCredit;

use App\Http\Controllers\Controller;
use App\Http\Requests\GovSecuritiesRequest;
use App\Repositories\Interfaces\GovSecuritiesRepositoryInterface;
use DB;
use Illuminate\Http\Request;
use JsonResponse4;

class GovSecuritiesController extends Controller
{

    protected $repository;
    public function __construct(GovSecuritiesRepositoryInterface $repository)
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

    public function store(GovSecuritiesRequest $request)
    {
        try {
            $result = $this->repository->storeOrUpdate($request->all());
            return responseCreated($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    public function update($id, GovSecuritiesRequest $request)
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
