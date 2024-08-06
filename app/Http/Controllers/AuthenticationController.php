<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthenticationController extends Controller
{
    use ResponseHelper;

    public UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => [Password::min(8)->max(32)->numbers()->symbols()->uncompromised()],
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {

            return response()->json($this->responseHelper(401, false, __('app.invalid_data'), $validator->errors(), self::class));

        }

        $validated = $validator->validated();

        $response = $this->service->register($validated);

        return response()->json($response);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => [Password::min(8)->max(32)->numbers()->symbols()->uncompromised()],
        ]);

        if ($validator->fails()) {

            return response()->json($this->responseHelper(401, false, __('app.invalid_data'), [], self::class));

        }

    }
}
