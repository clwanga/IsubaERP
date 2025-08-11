<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        $roles = Role::all();
        $users = User::with('role')->get();

        return view('auth.register',[
            'roles' => $roles,
            'users' => $users
        ]);
    }

    public function store(Request $request){

        $validated_data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users|string|max:35',
            'role_id' => 'required',
            'password' => 'required|confirmed'
        ]);

        $validated_data['password'] = Hash::make($request->input('password'));

        User::create($validated_data);
        ToastMagic::success('user created successfully');

        return back();

    }

    public function updateStatus(User $user){
        // get the current value
        $result = 0;

        $user->is_active == 0 ? $result = 1: $result = 0;
        
        //update the negation of the value
        $user->update([
            'is_active' => $result
        ]);

        ToastMagic::success('Operation successful');

        return back();
    }

    public function deleteUser(User $user){
        $user->delete();

        ToastMagic::success('user deleted successfully');

        return back();
    }
}
