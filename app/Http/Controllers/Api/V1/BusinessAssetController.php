<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BusinessAssetRepositoryInterface;
use App\Http\Requests\BusinessAssetRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class BusinessAssetController extends Controller
{
    /**
     * @var BusinessAssetRepositoryInterface
     */
    protected $repository;

    /**
     * BusinessAssetController constructor.
     * @param BusinessAssetRepositoryInterface $repository
     */
    public function __construct(BusinessAssetRepositoryInterface $repository)
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
            if (request('past_return')) {
                $where['past_return'] = request('past_return');
            }
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @param BusinessAssetRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(BusinessAssetRequest $request)
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
