<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\DirectoryShareRepositoryInterface;
use App\Http\Requests\DirectoryShareRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class DirectoryShareController extends Controller
{
    /**
     * @var DirectoryShareRepositoryInterface
     */
    protected $repository;

    /**
     * DirectoryShareController constructor.
     * @param DirectoryShareRepositoryInterface $repository
     */
    public function __construct(DirectoryShareRepositoryInterface $repository)
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
     * @param DirectoryShareRequest $request
     * @return \JsonResponse
     */
    public function storeOrUpdate(DirectoryShareRequest $request)
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
