<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserAuthRequest;

class UseAuthController extends Controller
{
    public function register()
    {
        return view('auth/users/register');
    }

    public function login(){
        return view('auth/users/login');
    }

    public function handleregister(UserAuthRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Votre compte a été crée, connectez vous');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
