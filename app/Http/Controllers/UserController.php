<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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
            session()->put('email', $user->email);
            session()->put('username', $user->username);
            session()->put('user_level', $user->user_level);
            return redirect()->route('dashboard');
        } else{
            session()->flash('loginFail', true);
            return view('admin.login', compact('email'));
        }
    }
    public function logout(){
        session()->pull('email');
        return redirect()->route('login');
    }
    public function index()
    {
        $users = User::orderBy('user_id')->paginate(5);
        return view('admin.modules.user.user', compact('users'));
    }

    public function create(Request $request)
    {
        return view('admin.modules.user.add_user');
    }
    public function store(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password == $request->re_password){
            $user->password = md5($request->password);
        }else return 'loi password';
        $user->user_level = $request->user_level;
        $user->save();
        session()->flash('success.created', 'Created');
        return redirect()->route('user');
    }

    public function show(Request $request)
    {
        $user_id = $request->id;
        $user = User::findOrFail($user_id);
        return view('admin.modules.user.edit_user', compact('user'));
    }
    public function update(Request $request)
    {
        $user_id = $request->id;
        $user = User::findOrFail($user_id);
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password == $request->re_password){
            $user->password = md5($request->password);
        }else return 'loi password';
        $user->user_level = $request->user_level;
        $user->save();
        session()->flash('success.updated', 'Updated');
        return redirect()->route('user');
    }
    public function destroy(Request $request)
    {
        $user_id = $request->id;
        $user = User::findOrFail($user_id);
        $user->delete();
        session()->flash('success.delete', 'Deleted');
        return redirect()->route('user');
    }
}
