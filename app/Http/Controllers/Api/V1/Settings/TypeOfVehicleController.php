<?php

namespace App\Http\Controllers\Api\V1\Settings;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Settings\TypeOfVehicleRepositoryInterface;
use App\Http\Requests\Settings\TypeOfVehicleRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class TypeOfVehicleController extends Controller
{
    /**
     * @var TypeOfVehicleRepositoryInterface
     */
    protected $repository;

    /**
     * TypeOfVehicleController constructor.
     * @param TypeOfVehicleRepositoryInterface $repository
     */
    public function __construct(TypeOfVehicleRepositoryInterface $repository)
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
     * @param TypeOfVehicleRequest $request
     * @return JsonResponse|JsonResponse4
     */
    public function store(TypeOfVehicleRequest $request)
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
     * @param TypeOfVehicleRequest $request
     * @return JsonResponse
     */
    public function update($id, TypeOfVehicleRequest $request)
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
