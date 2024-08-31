<?php

namespace App\Http\Controllers;

use App\Models\User;
//use DB;
use Illuminate\Http\Request;
//use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('main.forget_password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
        ]);

        $emailCount = User::where('email', $request->email)->count();

        if($emailCount == '1') {

            $token = Str::random(64);

            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
            ]);
            /*
            Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
            });*/
    
            return view('main.forgetPassword', ['token' => $token, 'email' => $request->email]);

            //return back()->with('message', 'We have e-mailed your password reset link!');
        } else {
            return view('main.forget_password', ['email' => $request->email]);
        }
    }
    public function showResetPasswordForm($token)
    {
        return view('main.forgetPasswordLink', ['token' => $token]);
    }
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('forget_password_success', 'Your password has been changed!');
    }
}
