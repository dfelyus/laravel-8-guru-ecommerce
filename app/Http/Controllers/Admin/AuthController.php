<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    public function home()
    {
        //return redirect('/admin/home');
        return view('BackEnd.Home.page');
    }

    public function store(Request $request)
    {
        if (!Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password'
            ]);
        }
        return redirect()->intended(route('admin.home'));
    }

    public function destroy()
    {
        Auth::guard('admin')->logout();
        return redirect('/home');
    }
}
