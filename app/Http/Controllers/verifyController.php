<?php

namespace App\Http\Controllers;
use App\User;


use Illuminate\Http\Request;

class verifyController extends Controller
{
   public function verify($token){
   
    $data = User::where('token', $token)->firstOrFail();
    if(!empty($data)) {
    	User::where('token', $token)->update(['token' => null]);
    	
    }
    
     // ->update(['token' -> null]); //verify the user with a token once the token is null; user is verified

      return redirect('home')->with('success', 'Account Verified');
   }
}
