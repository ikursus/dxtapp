<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class UserMembershipController extends Controller
{
    public function index()
    {
        $subscriptions = auth()->user()->subscriptions;

        return view('user.memberships.index', compact('subscriptions'));
    }

    public function create()
    {
        $memberships = Membership::all();

        return view('user.memberships.create', compact('memberships'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'membership_id' => ['required', 'integer']
        ]);

        if (auth()->user()->subscriptions()->where('membership_id', '=', $request->membership_id)->count() > 0)
        {
            return redirect()->back()->withErrors('Anda sudah subscribe kepada membership yang dipilih');
        }

        auth()->user()->subscriptions()->create($data);

        return redirect()->route('user.memberships.index')
        ->with('mesej-sukses', 'Subscription berjaya!');
    }
}
