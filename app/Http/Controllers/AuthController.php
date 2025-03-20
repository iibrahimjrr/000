<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showregisterform()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:50',
            'username'     => 'required|string|max:50|unique:users',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'age' => 'required|intger|max:2|'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'age'      => $request->age,
            'role'     => 'user'
        ]);
        Auth::login($user);

        return redirect()->route('login.form')->with('success', 'تم انشاء الحساب ينجاح');
    }

    public function showloginform()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validate))
        {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح');
        }
        return back()->withErrors(['email' => 'البيانات التي ادخلتها غير صحيحه']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('/login')->with('success', 'حتوحشنى والله ابقى تعلا تاني');
    }
}
