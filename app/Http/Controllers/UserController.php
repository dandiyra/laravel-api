<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Token;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('laravel-api')->accessToken;
            return response()->json(['accessToken' => $success['token'], 'user' => $user], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }


    public function show(Request $request)
    {
        $filters = $request->all();
        return User::when(isset($filters['userId']), function ($query) use ($filters) {
            return $query->where('id', $filters['userId']);
        })->orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        $data = [
            'full_name' => $request->full_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
        ];
        try {
            DB::beginTransaction();
            $response = User::create($data);

            DB::commit();
            return response([
                'status' => 'success',
                'message' => $response
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = [
                'full_name' => $request->full_name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'date_of_birth' => $request->date_of_birth,
                'age' => $request->age,
            ];
            DB::beginTransaction();
            User::where('id', $request->id)->update($data);
            $response = User::where('id', $request->id)->first();

            DB::commit();
            return response([
                'status' => 'success',
                'message' => $response
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function getById(Request $request)
    {
        $filters = $request->all();
        return User::when(isset($filters['id']), function ($query) use ($filters) {
            return $query->where('id', $filters['id'])->orWhere('id', 'like', '%' . $filters['id'] . '%');
        })->get();
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            User::where('id', $request->id)->delete();

            DB::commit();
            return response([
                'status' => 'success',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
