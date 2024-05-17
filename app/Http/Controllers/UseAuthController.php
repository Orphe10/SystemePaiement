<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\LoginAuthRequest;

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
            return redirect()->route('HandleUserLogin')->with('success', 'Votre compte a été crée, connectez vous');
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function handlelogin(LoginAuthRequest $request){
        try {
            if(auth()->attempt($request->only('email', 'password'))){
                return redirect('/');
            }else{
                return redirect()->back()->with('error','Information de connecxion non reconnu.');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function handlelogout(){
        Auth::logout();
        return redirect('/');
    }
}
