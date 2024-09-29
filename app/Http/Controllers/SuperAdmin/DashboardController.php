<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $jmlhuser = User::where('role', '!=', 'superadmin')->count();
        $title = 'Dashboard';
        return view('super-admin.index', compact('jmlhuser', 'title'));
    }
}
