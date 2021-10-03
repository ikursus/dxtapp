<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
}
