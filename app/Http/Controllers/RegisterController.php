<?php

namespace App\Http\Controllers;


use App\Mail\User\VerificationMail;
use App\Models\EmailVerificationPassword;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $rules    = [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar'   => 'nullable|image',
        ];
        $messages = [
            'name.required'      => 'Заполните поле имя',
            'email.required'     => 'Заполните поле e-mail',
            'email.email'        => 'Введите действительный e-mail',
            'email.unique'       => 'Этот e-mail уже существует',
            'password.required'  => 'Заполните поле паролей',
            'password.confirmed' => 'Пароли не совпадают',
            'avatar.image'       => 'Аватар не я вляется изображением',
        ];

        $validated = Validator::make($request->all(), $rules, $messages)->validate();


        if ($request->hasFile('avatar')) {
            $folder = date('Y-m-d');
            $avatar = $request->file('avatar')->store("images/{$folder}");
        }

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'avatar'   => $avatar ?? null,
        ]);
        if ($user) {
            Auth::login($user);
            $token = Str::random(6);
            EmailVerificationPassword::create([
                'user_id' => Auth::id(),
                'token'   => $token,
            ]);
            Mail::to(Auth::user()->email)->send(new VerificationMail($token));

            return view('mail.email-verification');
        }


        return redirect()->route('welcome');
    }
}
