<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo(){
        $role = Auth::user()->hakAkses;
        switch($role){
            case 'guest':
                return '/tiketku';
                break;
            default:
                return RouteServiceProvider::HOME;
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // protected function redirectTo()
    // {
    //     if (auth()->user()->hakAkses == 'guest') {
    //         return '/akun';
    //     }
    //     return '/dashboard';
    // }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
