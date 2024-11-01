<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnershipBusinessRequest;
use App\Repositories\Interfaces\PartnershipBusinessRepositoryInterface;
use DB;
use Illuminate\Http\JsonResponse;
use JsonResponse4;

class PartnershipBusinessController extends Controller
{

    protected $repository;
    public function __construct(PartnershipBusinessRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        try {
            $where = [
                'user_id' => auth()->id()
            ];
            if (request('past_return')) {
                $where['past_return'] = request('past_return');
            }
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    public function storeOrUpdate(PartnershipBusinessRequest $request)
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
