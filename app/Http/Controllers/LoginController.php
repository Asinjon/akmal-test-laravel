<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginStoreRequest $request)
    {
        if (Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('welcome');
        }

        return redirect()->back();
    }
}
