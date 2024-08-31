<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view() {
        return view('main.register');
    }
    public function register(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password'=> 'required',
            'phone' => 'required|numeric|digits:10'
        ]);
        $user = new User;
        $user->username =$request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->save();
        $user = User::where('username',$request->username)->orWhere('email',$request->username)->first();
        if($user){
            // user details found
            if(Hash::check($request->password, $user->password)){
                // password crt
                if(!$user->is_active){
                    return back()->with('login_error','Email Verification Pending');
                }
                Auth::login($user);
                if($user->role == 1){
                    session()->put('admin',$user->username);
                    session()->put('super',$user->username);
                    return redirect('/admin/dashboard');
                }
                if($user->role == 2){
                    session()->put('admin',$user->username);
                    return redirect('/admin/dashboard');
                }
                return redirect('/users_dashboard');
            }
            else{
                // password wrng
                return back()->with('login_error','Password not Match!');
            }
        }
        else{
            // not get user details
            return back()->with('login_error','No Account Found!');
        }
        //return back()->with('register_success','Register Successful');
        //return redirect('/dashboard')->with('status', 'Profile updated!');

    }
    public function display() {
        return view('main.login');
    }
    public function login(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);
        $user = User::where('username',$request->username)->orWhere('email',$request->username)->first();
        if($user){
            // user details found
            if(Hash::check($request->password, $user->password)){
                // password crt
                if(!$user->is_active){
                    return back()->with('login_error','Email Verification Pending');
                }
                Auth::login($user);
                if($user->role == 1){
                    session()->put('admin',$user->username);
                    session()->put('super',$user->username);
                    return redirect('/admin/dashboard');
                }
                if($user->role == 2){
                    session()->put('admin',$user->username);
                    return redirect('/admin/dashboard');
                }
                return redirect('/users_dashboard');
            }
            else{
                // password wrng
                return back()->with('login_error','Password not Match!');
            }
        }
        else{
            // not get user details
            return back()->with('login_error','No Account Found!');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
