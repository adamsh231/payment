<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function authAdmin(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ], $messages);

        if (Auth::guard('admin')->attempt($request->only('username', 'password'), $remember = false)) {
            return redirect('/admin');
        } else {
            return back()->with('status', 'Login Failed! Wrong Email or Password');
        }
    }

    public function authKaryawan(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ], $messages);

        if (Auth::guard('karyawan')->attempt($request->only('username', 'password'), $remember = false)) {
            return redirect('/karyawan');
        } else {
            return back()->with('status', 'Login Failed! Wrong Email or Password');
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if (Auth::guard('karyawan')->check()) {
            Auth::guard('karyawan')->logout();
        }
        return redirect('/');
    }
}
