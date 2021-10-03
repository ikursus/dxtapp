<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function update(Request $request, $id)
    {
        auth()->user()->unreadNotifications()->where('id', $id)->update(['read_at' => now()]);

        return redirect()->back();
    }
}
