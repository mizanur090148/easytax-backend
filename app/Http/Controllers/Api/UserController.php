<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function update(Request $request, $user)
    {

        try {
            $data = $this->userService->update($request->all(), $user);
            return $this->customResponse('User updated successfully', 200, $data);
        } catch (\Exception $e) {
            return $this->customResponse('Error updating user', 500, ['error' => $e->getMessage()]);
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
