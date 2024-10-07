<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

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
    public function index(Request $request)
    {
        Auth::logout(); // Logout pengguna

        // Invalidate session dan regenerate token CSRF untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
