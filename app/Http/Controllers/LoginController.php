<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){

        $validated = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);

        try {
            //find user details
            $user = User::where('email', $request->input('email'))->first();
    
            if (!Auth::attempt($validated)) {
                ToastMagic::error('Oops!');
    
                return back()->withErrors([
                    'email' => 'Invalid credentials'
                ])->onlyInput('email');
                
            }else if ($user->is_active == 0) {
    
                return back()->withErrors([
                    'email' => 'User deactivated! Contact Administrator'
                ])->onlyInput('email');
            }
    
            $request->session()->regenerate();
    
            ToastMagic::success("welcome! $user->name");
    
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }

    public function logout(Request $request){
        try {
            Auth::logout();
    
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            ToastMagic::success('Bye 👋');
    
            return redirect()->route('login');
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }
}
