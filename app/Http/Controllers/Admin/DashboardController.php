<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Membership;

class DashboardController extends Controller
{
    public function index()
    {
        $userActive = User::statusActive();
        $userInActive = User::statusInActive();
        $subscriptionTotal = Subscription::totalSubscribed();
        $membershipTotal = Membership::totalPlan();

        return view('admin.template_dashboard', compact(
            'userActive',
            'userInActive',
            'subscriptionTotal',
            'membershipTotal'
        ));
    }
}
