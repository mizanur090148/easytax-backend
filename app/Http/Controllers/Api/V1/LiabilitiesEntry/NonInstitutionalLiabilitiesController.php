<?php

namespace App\Http\Controllers\Api\V1\LiabilitiesEntry;

use App\Http\Controllers\Api\V1\Exception;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\NonInstitutionalLiabilitiesRepositoryInterface;
use DB;
use Illuminate\Http\Request;
use JsonResponse4;

class NonInstitutionalLiabilitiesController extends Controller
{

    protected $repository;

    public function __construct(NonInstitutionalLiabilitiesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        try {
            $where = [
                'user_id' => auth()->id(),
                'type_of_liabilities_entry' => 'non-institutional'
            ];
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }



    public function storeOrUpdate(Request $request)
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
