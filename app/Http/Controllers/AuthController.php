<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Phân quyền điều hướng (thay thế cho logic thuần)
            $role = Auth::user()->role;
            if ($role === 'admin' || $role == 1) {
                return redirect()->intended('/admin'); // Admin dashboard
            } elseif ($role === 'staff') {
                return redirect()->intended('/checkin'); // Staff dashboard / portal
            } else {
                return redirect()->intended('/user/dashboard'); // User/Client dashboard
            }
        }

        return back()->withErrors([
            'email' => 'Sai email hoặc mật khẩu!',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'staff',
        ]);

        // Bỏ qua tự động đăng nhập sau khi đăng ký
        // Auth::login($user);

        // Điều hướng về trang login kèm thông báo thành công
        return redirect('/login?success=register_success');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
