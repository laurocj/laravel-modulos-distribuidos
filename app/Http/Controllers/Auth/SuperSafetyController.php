<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class SuperSafetyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SuperSafety Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function login(Request $request)
    {

        return view('auth.supersafety');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function super_safety(Request $request)
    {
        $request->session()->put('supersafety', true);

        return redirect()->intended();
    }
}