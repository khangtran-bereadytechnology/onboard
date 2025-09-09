<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.signup');
    }
    public function signUp(SignupRequest $request)
    {
        //taọ người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //đăng nhập người dùng (xác thực) trong ứng dụng
        Auth::login($user);

        //chuyển hướng trang
        return Redirect::to('/')->with('success', 'Sign up successfull!');
    }

    public function showSigninForm()
    {
        return view('auth.signin');
    }
    public function signIn(SigninRequest $request)
    {
        $credentials = $request->validated();
        //kiểm tra thông tin đăng nhập
        //xác thực thành công
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return Redirect::to('/')->with('success', 'Sign in successfull!');
        }
        //xác thực thất bại  
        return back()->withErrors(['error' => 'Thông tin đăng nhập không hợp lệ']);
    }

    public function signOut(Request $request)
    {
        //đăng xuất trong ứng dụng
        Auth::logout();

        // khai báo session hết hạn
        $request->session()->invalidate();

        // tạo dữ session mới, dồng thời xóa session cũ
        $request->session()->regenerateToken();

        //chuyển hướng về trang chủ
        return redirect('/')->with('success', 'Sign out successfull!');
    }
}
