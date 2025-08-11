<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        try {
            $validated_data['password'] = Hash::make($request->input('password'));
    
            User::create($validated_data);
            ToastMagic::success('user created successfully');
    
            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }


    }

    public function updateStatus(User $user){
        try {
            // get the current value
            $result = 0;

            $user->is_active == 0 ? $result = 1: $result = 0;
            
            //update the negation of the value
            $user->update([
                'is_active' => $result
            ]);

            ToastMagic::success('Operation successful');

            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }

    }

    public function deleteUser(User $user){
        try {
            $user->delete();

            ToastMagic::success('user deleted successfully');
            return back();

        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }
}
