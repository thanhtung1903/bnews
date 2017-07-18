<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        // xử lý
        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Authentication passed...
            return redirect()->route('admin.index.index');
        }else{
            $request->session()->flash('msg', 'Sai username hoặc password');
            return redirect()->route('auth.auth.login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.index.index');
    }
}
