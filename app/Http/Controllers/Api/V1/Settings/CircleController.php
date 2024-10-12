<?php

namespace App\Http\Controllers\Api\V1\Settings;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Settings\CircleRepositoryInterface;
use App\Http\Requests\Settings\CircleRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class CircleController extends Controller
{
    /**
     * @var CircleRepositoryInterface
     */
    protected $repository;

    /**
     * CircleController constructor.
     * @param CircleRepositoryInterface $repository
     */
    public function __construct(CircleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResponse|\JsonResponse
     */
    public function index()
    {
        try {
            return responseSuccess($this->repository->all());
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @param CircleRequest $request
     * @return JsonResponse|JsonResponse4
     */
    public function store(CircleRequest $request)
    {
        try {
            $result = $this->repository->store($request->all());
            return responseCreated($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    /**
     * @param $id
     * @param CircleRequest $request
     * @return JsonResponse
     */
    public function update($id, CircleRequest $request)
    {
        try {
            $result = $this->repository->update($id, $request->validated());
            return responsePatched($result);
        } catch (Exception $e) {
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
