<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VerifyController extends Controller

    /***
     * verify the user with a given token
     */
{
    public function verify($token){
        $user = User::where('token', $token)->firstOrFail();
        $user->update(['token'=> null ]);
        return redirect()
            ->route('dashboard')
            ->with('success', 'Account Verified');
    }
}
