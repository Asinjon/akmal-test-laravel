<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest;
use App\Mail\User\LoginMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            $email = $request->email;
            Mail::to($email)->send(new LoginMail($email));
            return redirect()->route('welcome');
        }

        return redirect()->back()->with(['login_error' => 'Неправильный пользователь или пароль']);
    }
}
