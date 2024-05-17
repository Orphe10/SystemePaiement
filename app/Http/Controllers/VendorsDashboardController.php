<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorsDashboardController extends Controller
{
    public function index(){
        return 'vendeur connecte';
    }
    public function logout(){
        Auth::guard('vendor')->logout();
        return redirect()->route('VendorsLogin');
    }
}
