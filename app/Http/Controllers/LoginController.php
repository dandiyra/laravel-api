<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'

        ]);

        if ($validator->fails())  
        {
            return response()->json(['status_code'=> 400, 'message'=>'Gagal']);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'status_code'=>200,
            'message' =>'Berhasil'
        ]);
    }

    public function index(Request $request)
            {
                //memvalidasi masukkan, email dan password wajib diisi
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);
        
                // mengambil data user berdasarkan email yang dikirm
                $user= User::where('email', $request->email)->first();
                
                //jika user dan password salah maka tampilkan pesan error
                if (!$user || !Hash::check($request->password, $user->password)) {
                    return response([
                        'success'   => false,
                        'message' => ['Email atau Password salah']
                    ], 404);
                }
                
                //jika kondisi di atas bisa dilewati, selanjutnya buatlah token baru
                $token = $user->createToken('ApiToken')->plainTextToken;
            
                //isi response json berupa data user dan token
                $response = [
                    'success'   => true,
                    'user'      => $user,
                    'token'     => $token
                ];
                
                //kembalikan atau tampilkan response
                return response($response, 201);
            }
            
            /**
             * logout
             *
             * @return void
             */
            public function logout(Request $request)
            {
        
                $user = $request->user();
                $user->currentAccessToken()->delete();
        
                return response()->json([
                    'massage'  =>   'Berhasil Logout'
                ],200);
            }
}
