<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use PDOException;



class UserController extends Controller
{
    public function index(){
        if($user = Auth::user()){
            switch($user->level){
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pemesanan');
                    break; 
            }
        }
        return view('auth.login');
    }
    public function cekLogin(AuthRequest $request){
        $credential = $request->only('email', 'password');
        $request->session()->regenerate();

        if(Auth::attempt($credential)){
            $user = Auth::user();
            switch ($user->level){
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pemesanan');
                    break;

            }
        }
        
        // Jika autentikasi gagal, kembalikan pengguna ke halaman sebelumnya dengan pesan kesalahan
        return back()->withErrors([
            'notfound' => 'Email or password is wrong'
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
