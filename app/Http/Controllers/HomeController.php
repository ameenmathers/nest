<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function dashboard() {

        if(Auth::user()->role == 'agent') return to_route('agent-dashboard');
        if(Auth::user()->role == 'client') return to_route('client-dashboard');
        if(Auth::user()->role == 'admin') return to_route('admin-dashboard');

        return to_route('welcome');
    }

    public function logout(Request $request) {

        try {
            Session::flush();
            Auth::logout();
            return redirect('/');

        } catch (\Exception $e) {

            $request->session()->flash('error','Logout Failed');
            return Redirect::back();
        }

    }
}
