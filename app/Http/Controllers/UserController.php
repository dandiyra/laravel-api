<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function store(Request $request){
                
        // membuat validasi semua field wajib diisi
        // email harus format email dan unik
        // password minimal 8 karakter
        $validasi = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8'
        ]);
                    
                    
        //melakukan insert data 
        $users              = new User;
        $users->name        = $request->name;
        $users->email       = $request->email;
                    
        //password di-hash agar tidak terbaca
        $users->password    = Hash::make($request->password);
                
        //jika berhasil maka simpan data dengan methode $post->save()
        if($users->save()){
            return response()->json( 'Post Berhasil Disimpan');
        }else{
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function update($id, Request $request){

        // membuat validasi semua field wajib diisi
        // email harus format email dan unik
        // password minimal 8 karakter
        $validasi = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8'
        ]);
    
        //melakukan update data berdasarkan id
        $users              = User::find($id);
        $users->name        = $request->name;
        $users->email       = $request->email;
            
        //password di-hash agar tidak terbaca
        $users->password    = Hash::make($request->password);
        
        //jika berhasil maka simpan data dengan method $post->save()
        if($users->save()){
            return response()->json( 'Post Berhasil Disimpan');
        }else{
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function delete($id){
        //mencari data sesuai $id
        //$id diambil dari ujung url yang kita kirimkan dengan postman
        $user = User::findOrFail($id);
        
        // jika data berhasil didelete maka tampilkan pesan json 
        if($user->delete()){
            return response([
                'Berhasil Menghapus Data'
            ]);
        }else{
            //response jika gagal menghapus
            return response([
                'Tidak Berhasil Menghapus Data'
            ]);
        }
    }


    public function index(){
        // mengambil data dari tabel users dan menyimpannya pada variabel $users
        $users  = User::all();
        return response([
            $users
        ]);
    }
}
