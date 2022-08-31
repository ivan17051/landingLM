<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        return view('public.home');
    }

    public function jadwal(){
        return view('public.jadwal');
    }

    public function login(){
        return view('auth.login');
    }
}
