<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(auth()->attempt($credentials)) {
            return redirect('/');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function doLogout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function profile($id)
    {
        $data = User::select('id','nama','username','password','role')->where('id', $id)->first();
        return view ('auth.profile', compact('data'));
    }

    public function profil_store(Request $request, $id)
    {
        $data = User::select('id','nama','username','role')->where('id',$id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'role' => $request->role,
        ]);
        return redirect()->route('profile', [$id])->with('success', 'Data berhasil diubah!');
    }

    public function password_store(Request $request, $id)
    {
        $password_baru = $request->password_baru;
        $password_baru_konfir = $request->password_baru_konfir;

        if($password_baru == $password_baru_konfir){
            $data = User::select('id','password')->where('id',$id)->update([
                'password' => bcrypt($request->password_baru) 
            ]);
            return redirect()->route('profile', [$id])->with('success', 'Data berhasil diubah!');
        }else{
            return redirect()->route('profile', [$id])->with('error', 'Konfirmasi password tidak cocok!');
        }
        
    }
}
