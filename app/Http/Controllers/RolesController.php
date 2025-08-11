<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RolesController extends Controller
{
    public function roles(){
        $roles = Role::all();
        return view('auth.roles')->with('roles', $roles);
    }

    public function store(Request $request){
        try {
            $validated_data = $request->validate([
                'role' => 'required|max:30',
                'description' => 'string|required|max:100'
            ]);
    
            Role::create($validated_data);
            ToastMagic::success('operation successful');
    
            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }
}
