<?php

namespace App\Http\Controllers;
use App\Models\User;
use Alert;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $user = User::all();
        $userAll = User::where('is_active', true)->get();
        $users = User::where('is_active',false)->get();
        // return view('admin.user.index',compact('users', 'userAll'));
        return view('admin.user.index',compact('user'));
    }

    public function activate(User $user){
        $user->is_active = true;
        $user->save();
        return redirect()->back()->with('success', 'User has been activated');
        // return redirect('admin/user')->with('success', 'User has been activated');
    }
    public function showProfile(){
        $user = User::findOrFail(Auth::id());
        return view('admin.user.profile', compact('user'));

    }

}
