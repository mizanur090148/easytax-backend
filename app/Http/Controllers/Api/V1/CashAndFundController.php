<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CashAndFundRepositoryInterface;
use App\Http\Requests\CashAndFundRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class CashAndFundController extends Controller
{
    /**
     * @var CashAndFundRepositoryInterface
     */
    protected $repository;

    /**
     * CashAndFundController constructor.
     * @param CashAndFundRepositoryInterface $repository
     */
    public function __construct(CashAndFundRepositoryInterface $repository)
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
            if (request('type')) {
                $where['type'] = request('type');
            }
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @param CashAndFundRequest $request
     * @return JsonResponse|JsonResponse4
     */
    // public function store(CashAndFundRequest $request)
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
     * @param CashAndFundRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(CashAndFundRequest $request)
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
