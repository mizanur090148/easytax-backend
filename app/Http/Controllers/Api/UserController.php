<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function clientList(Request $request)
    {

        try {
            $data = $this->userService->clientList($request->all());
            return $this->customResponse('User get successfully', 200, $data);
        } catch (\Exception $e) {
            return $this->customResponse('Error get user', 500, ['error' => $e->getMessage()]);
        }
    }
    public function clientStore(Request $request)
    {

        try {
            $data = $this->userService->clientSave($request->all());
            return $this->customResponse('User get successfully', 200, $data);
        } catch (\Exception $e) {
            return $this->customResponse('Error get user', 500, ['error' => $e->getMessage()]);
        }
    }
    public function clientUpdate(Request $request, $user)
    {

        try {
            $data = $this->userService->update($request->all(), $user);
            return $this->customResponse('User updated successfully', 200, $data);
        } catch (\Exception $e) {
            return $this->customResponse('Error updating user', 500, ['error' => $e->getMessage()]);
        }
    }
    public function clientDestroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user and their associated user details
        $user->delete();

        return $this->customResponse('User deleted successfully', 200, $user);

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

    function responseSuccess($data = null, $message = "Request processed successfully")
    {
        $response = [
            'success' => true,
            'message' => $message
        ];

        if ($data || is_array($data)) {
            $response['data'] = $data;
        }
        return response()->json($response, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8']);
    }
}
