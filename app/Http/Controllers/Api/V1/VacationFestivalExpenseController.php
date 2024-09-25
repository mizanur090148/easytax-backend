<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\VacationFestivalExpenseRepositoryInterface;
use App\Http\Requests\VacationFestivalExpenseRequest;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class VacationFestivalExpenseController extends Controller
{
    /**
     * @var SelfAndFamilyExpenseRepositoryInterface
     */
    protected $repository;

    /**
     * constructor.
     * @param VacationFestivalExpenseRepositoryInterface $repository
     */
    public function __construct(VacationFestivalExpenseRepositoryInterface $repository)
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
            return responseSuccess($this->repository->all($where));
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @param VacationFestivalExpenseRequest $request
     * @return JsonResponse|JsonResponse4
     */
    public function store(VacationFestivalExpenseRequest $request)
    {
        try {
            $result = $this->repository->store($request->all());
            return responseCreated($result);
        } catch (Exception $e) {
            return responseCantProcess($e);
        }
    }

    /**
     * @param VacationFestivalExpenseRequest $request
     * @return \JsonResponse
     */
    public function update($id, VacationFestivalExpenseRequest $request)
    {
        try {
            $result = $this->repository->update($id, $request->all());
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
