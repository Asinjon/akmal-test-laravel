<?php

namespace App\Http\Controllers;

use App\Models\EmailVerificationPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    public function check(Request $request)
    {
        $real_token = EmailVerificationPassword::where('user_id', auth()->id())->first();
        if ($real_token->token == $request->token) {
            $user                    = User::find(Auth::id());
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            $real_token->delete();

            return redirect()->route('welcome');
        } else {
            return redirect()->back();
        }
    }
}
