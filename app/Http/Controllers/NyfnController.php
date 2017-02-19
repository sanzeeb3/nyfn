<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NyfnController extends Controller
{
    public function afterReg()
    {
    	$message= "Successfully Registered! Please Pay the registration fee within 7 days of registration, Or your registration will get cancelled automatically thereafter.";
        
    	return view('auth.login')->with('message',$message);
    }
}
