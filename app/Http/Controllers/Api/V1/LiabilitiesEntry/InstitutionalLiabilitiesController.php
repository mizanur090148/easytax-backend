<?php

namespace App\Http\Controllers\Api\V1\LiabilitiesEntry;

use App\Http\Controllers\Api\V1\Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstitutionalLiabilitiesRequest;
use App\Repositories\Interfaces\InstitutionalLiabilitiesRepositoryInterface;
use DB;
use Illuminate\Http\JsonResponse;
use JsonResponse4;

class InstitutionalLiabilitiesController extends Controller
{

    protected $repository;

    public function __construct(InstitutionalLiabilitiesRepositoryInterface $repository)
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



    public function storeOrUpdate(InstitutionalLiabilitiesRequest $request)
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
