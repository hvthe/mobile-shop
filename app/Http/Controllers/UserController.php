<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{
    public function index()
    {
        // if (!Gate::forUser(session()->get('user'))->allows('view-page-admin')) {
        //     abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        // }
        $users = User::orderBy('user_id')->paginate(5);
        return view('admin.modules.user.user', compact('users'));
    }

    public function create()
    {
        // if (!Gate::forUser(session()->get('user'))->allows('view-page-admin')) {
        //     abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        // }
        return view('admin.modules.user.add_user');
    }
    public function store(Request $request)
    {
        // if (!Gate::forUser(session()->get('user'))->allows('view-page-admin')) {
        //     abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        // }
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
        // if (!Gate::forUser(session()->get('user'))->allows('view-page-admin')) {
        //     abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        // }
        $user_id = $request->id;
        $user = User::findOrFail($user_id);
        return view('admin.modules.user.edit_user', compact('user'));
    }
    public function update(Request $request)
    {
        // if (!Gate::forUser(session()->get('user'))->allows('view-page-admin')) {
        //     abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        // }
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
        // if (!Gate::forUser(session()->get('user'))->allows('view-page-admin')) {
        //     abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        // }
        $user_id = $request->id;
        $user = User::findOrFail($user_id);
        $user->delete();
        session()->flash('success.delete', 'Deleted');
        return redirect()->route('user');
    }
}
