<?php

namespace App\Http\Controllers\Api\V1\Settings;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Settings\ZoneRepositoryInterface;
use App\Http\Requests\Settings\ZoneRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class ZoneController extends Controller
{
    /**
     * @var ZoneRepositoryInterface
     */
    protected $repository;

    /**
     * ZoneController constructor.
     * @param ZoneRepositoryInterface $repository
     */
    public function __construct(ZoneRepositoryInterface $repository)
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
     * @param ZoneRequest $request
     * @return JsonResponse|JsonResponse4
     */
    public function store(ZoneRequest $request)
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
     * @param ZoneRequest $request
     * @return JsonResponse
     */
    public function update($id, ZoneRequest $request)
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
