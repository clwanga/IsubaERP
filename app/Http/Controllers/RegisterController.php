<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        dd($request);
        $validated_data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users|string|max:35',
            'role_id' => 'required',
            'password' => 'required|confirmed'
        ]);

        $validated_data['password'] = Hash::make($request->input('password'));

        User::create($validated_data);

        return back();

    }
}
