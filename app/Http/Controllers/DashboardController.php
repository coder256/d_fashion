<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $totalActiveAdmins = User::where('role','admin')->count();
        $totalActiveManagers = 0;
        $totalActiveTrainees = 0;
        $totalActiveEmployers = count($users);
        $totalInactiveUsers = 0;

        return view('dashboard.home', compact('users','totalActiveManagers','totalActiveAdmins',
            'totalActiveTrainees','totalActiveEmployers','totalInactiveUsers'));
        //return view('dashboard.users.index', ['users'=>$users]);
    }
}
