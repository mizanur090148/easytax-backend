<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AssetEntryBusinessAssetAssetEntry;
use App\Services\AssetEntryService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class AssetEntryController extends Controller
{
    protected $assetEntryService;

    public function __construct(AssetEntryService $assetEntryService)
    {
        $this->assetEntryService = $assetEntryService;
    }

    public function index()
    {
        $data = $this->assetEntryService->getAll();
        return $this->customResponse('Asset Entry lists', 200, $data);

    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'nullable|exists:users,id',
                'business_assets' => 'nullable|array',
                'partnership_business' => 'nullable|array',
                'director_share_in_limited_company' => 'nullable|array',
                'non_agriculture_land' => 'nullable|array',
                'agriculture_land' => 'nullable|array',
                'financial_assets' => 'nullable|array',
                'motor_vehicles' => 'nullable|array',
                'jewellery' => 'nullable|array',
                'furniture_equipment' => 'nullable|array',
                'other_asset' => 'nullable|array',
                'asset_outside_bd' => 'nullable|array',
                'cash_fund' => 'nullable|array',
            ]);

            $data = $this->assetEntryService->create($validatedData);
            return $this->customResponse('Asset Entry created successfully', 201, $data);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'status' => 422,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'status' => 500,
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function show(AssetEntry $assetEntry)
    {
        return response()->json($assetEntry);
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'nullable',
                'business_assets' => 'nullable|array',
                'partnership_business' => 'nullable|array',
                'director_share_in_limited_company' => 'nullable|array',
                'non_agriculture_land' => 'nullable|array',
                'agriculture_land' => 'nullable|array',
                'financial_assets' => 'nullable|array',
                'motor_vehicles' => 'nullable|array',
                'jewellery' => 'nullable|array',
                'furniture_equipment' => 'nullable|array',
                'other_asset' => 'nullable|array',
                'asset_outside_bd' => 'nullable|array',
                'cash_fund' => 'nullable|array',
            ]);

            $data = $this->assetEntryService->update($id, $validatedData);
            return response()->json($data);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'status' => 422,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'status' => 500,
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->assetEntryService->delete($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'status' => 500,
                'errors' => $e->getMessage()
            ], 500);
        }
    }
    protected function customResponse(string $message, int $status, $data)
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ], $status);
    }
}
