<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorAuthRequest;
use Exception;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorAuthController extends Controller
{
    public function login(){
        return view('auth/vendors/login');
    }
    public function register(){
        return view('auth/vendors/register');
    }

    public function vendorhandleregister(VendorAuthRequest $request){
        try {
            Vendor::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('VendorsLogin')->with('success', 'Votre compte vendeur a été crée, connectez-vous');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
