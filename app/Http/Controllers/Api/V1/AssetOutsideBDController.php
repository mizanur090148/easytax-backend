<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssetOutsideBDRequest;
use App\Repositories\Interfaces\AssetOutsideBDRepositoryInterface;
use DB;
use Illuminate\Http\JsonResponse;
use JsonResponse4;

class AssetOutsideBDController extends Controller
{
    /**
     * @varAssetOutsideBDRepositoryInterface
     */
    protected $repository;

    /**
     *AssetOutsideBDController constructor.
     * @paramAssetOutsideBDRepositoryInterface $repository
     */
    public function __construct(AssetOutsideBDRepositoryInterface $repository)
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
     * @paramAssetOutsideBDRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(AssetOutsideBDRequest $request)
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
     * @paramAssetOutsideBDRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(AssetOutsideBDRequest $request)
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
