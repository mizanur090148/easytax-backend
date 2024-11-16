<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\TotalDataService;
use Illuminate\Http\JsonResponse;
use DB, JsonResponse4;

class TotalDataController extends Controller
{
    /**
     * @var BusinessAssetRepositoryInterface
     */
    protected $repository;

    /**
     * TotalDataController constructor.
     */
    public function __construct(TotalDataService $service)
    {
        $this->service = $service;
    }

    /**
     * @return JsonResponse|\JsonResponse
     */
    public function pastReturnTotal()
    {
        try {
            return responseSuccess($this->service->pastReturnTotal());
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }

    /**
     * @return JsonResponse|\JsonResponse
     */
    public function assetsReturnTotal()
    {
        try {
            return responseSuccess($this->service->assetsReturnTotal());
        } catch (Exception $e) {
        	return responseCantProcess($e);
        }
    }
}
