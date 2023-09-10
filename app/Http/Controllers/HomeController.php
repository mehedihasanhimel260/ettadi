<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('backend.user.dashboard.index');
    }
    public function adminIndex()
    {
        return view('backend.admin.dashboard.index');
    }
    function redirect() {
        $user = Auth::user(); // Assuming you have user authentication set up.

        if ($user && $user->type === 'admin') {
            return redirect('/admin/home');
        } elseif ($user && $user->type === 'user') {
            return redirect('/user/home');
        }

    }
}
