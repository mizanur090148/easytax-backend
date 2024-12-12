<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Models\User;
use Validator, DB;


class AuthController extends Controller
{

    public function register()
    {
        $data = request()->only('full_name', 'mobile','gender','profile_type','dob','email', 'password');
        $validator = Validator::make($data, [
            'full_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'profile_type' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:users',
            //'password' => 'required|confirmed|min:8',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            DB::beginTransaction();
            $user = User::create([
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
            $user->userDetail()->create(request()->only('full_name', 'mobile','gender','profile_type','dob'));
            DB::commit();

            return $this->customResponse('User registered successfully', 201, $user);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return response()->json(['error' => 'Registration failed'], 500);
        }
    }


    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $assessmentYear = Setting::where([
            "type" => "assessment-year",
            "status" => 1
        ])->first();

        $result = auth()->user()->load('userDetail');
        $result['token'] = $token;

        $user = auth()->user()->load(
            'userDetail',
            'userDetail.circle:id,name',
            'userDetail.zone:id,name',
            'userDetail.taxPayerLocation:id,name'
        );

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'Login successful.',
            ],
            'data' => [
                'user' => $user,
                'assessmentYear' => $assessmentYear,
                'access_token' => [
                    'token' => $token,
                    'type' => 'Bearer',
                    'expires_in' => auth()->factory()->getTTL() * 60,
                ],
            ],
        ]);
    }

    public function me()
    {

        return $this->customResponse('Authenticated user', 200, auth()->user());
    }


    public function logout()
    {
        auth()->logout();

        return $this->customResponse('Successfully logged out', 200, null);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    protected function respondWithToken($token)
    {
      $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
        return $this->customResponse('Token generated successfully', 200, $data);

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
