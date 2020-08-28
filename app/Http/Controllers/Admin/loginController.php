<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\loginRequest;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }
    public function doLogin(loginRequest $request){


        $remember_me = $request->has('remember_me') ? true : false ;

        if ( auth()->guard('admin')->attempt(
            ['email'=>$request->input('email'), 'password'=>$request->input('password') ])){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with(['error'=>'البيانات غير صحيحة ']);
        }
    }
    public function logout(){
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
