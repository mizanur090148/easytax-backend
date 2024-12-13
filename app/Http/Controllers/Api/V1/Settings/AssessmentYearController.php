<?php

namespace App\Http\Controllers\Api\V1\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\AssessmentYearRequest;
use App\Repositories\Interfaces\Settings\AssessmentYearRepositoryInterface;
use DB;
use Illuminate\Http\JsonResponse;
use JsonResponse4;

class AssessmentYearController extends Controller
{
    /**
     * @var AssessmentYearRepositoryInterface
     */
    protected $repository;

    /**
     * AssessmentYearController constructor.
     * @param AssessmentYearRepositoryInterface $repository
     */
    public function __construct(AssessmentYearRepositoryInterface $repository)
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
     * @param AssessmentYearRequest $request
     * @return JsonResponse|JsonResponse4
     */
    public function store(AssessmentYearRequest $request)
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
     * @param AssessmentYearRequest $request
     * @return JsonResponse
     */
    public function update($id, AssessmentYearRequest $request)
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
