<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function checkUser(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email|min:8',
            'password' => 'required|min:2',
        ]);
        $email = $request->email;
        $password = md5($request->password);
        $user = User::where('email', $email)->where('password', $password)->first();
        if($user){
            session()->put('user', $user);
            return redirect()->route('dashboard');
        } else{
            session()->flash('loginFail', true);
            return view('admin.login', compact('email'));
        }
    }
    public function logout(){
        session()->pull('user');
        return redirect()->route('login');
    }
}
