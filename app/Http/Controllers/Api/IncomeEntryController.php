<?php

namespace App\Http\Controllers\Api;

use App\Models\IncomeEntry;
use App\Services\IncomeEntryService;
use App\Http\Requests\IncomeEntryRequest;
use App\Http\Requests\GovernmentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class IncomeEntryController extends Controller
{
    protected $incomeEntryService;

    public function __construct(IncomeEntryService $incomeEntryService)
    {
        $this->incomeEntryService = $incomeEntryService;
    }

    public function index()
    {
        $data = $this->incomeEntryService->getAll();
        return $this->customResponse('Income Entry lists', 200, $data);
    }

    public function store(GovernmentRequest $request)
    {
        try {
            $data = $this->incomeEntryService->store($request->all());
            return $this->customResponse('Created successfully', 201, $data);
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

    public function show($userId)
    {
        $data = $this->incomeEntryService->show($userId);
        return $this->customResponse('Income Entry', 200, $data);
    }

    public function update(GovernmentRequest $request, $id)
    {
        try {
            $data = $this->incomeEntryService->update($id, $request->all());
            return $this->customResponse('Updated successfully', 200, $data);
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
            $this->incomeEntryService->delete($id);
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
