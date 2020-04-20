<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function authAdmin(Request $request)
    {
        // $messages = [
        //     'required' => 'The :attribute field is required.',
        // ];
        // $request->validate([
        //     'username' => ['required'],
        //     'password' => ['required'],
        // ], $messages);

        if (Auth::guard('admin')->attempt($request->only('username', 'password'), $remember = false)) {
            return response()->json([
                'error' => false,
            ], 200);
        } else {
            return response()->json([
                'error' => true,
            ], 404);
        }
    }

    public function authKaryawan(Request $request)
    {

        if (Auth::guard('karyawan')->attempt($request->only('username', 'password'), $remember = false)) {
            return response()->json([
                'error' => false,
            ], 200);
        } else {
            return response()->json([
                'error' => true,
            ], 404);
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
