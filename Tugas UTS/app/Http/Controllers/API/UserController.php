<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Helpers\ApiFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $user = user::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $data = user::where('name', '=', $user->name)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}