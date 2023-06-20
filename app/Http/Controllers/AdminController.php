<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        if(auth()->check()){
            return redirect()->to('/admin/categories');
        }

        return view('login');
    }
//
    public function postLogin(Request $request)
    {

        $checkLogin = $this->userService->login($request);
        if($checkLogin !== null){
            auth()->login($checkLogin);
            return redirect()->to('/admin/categories');
        }
        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }



}
