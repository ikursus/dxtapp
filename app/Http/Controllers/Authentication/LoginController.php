<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function paparBorang() {

        return view('authentication.template_login');

    }

    public function checkLogin(LoginRequest $request) {

        // $data = $request->all();
        // $data = $request->only(['member_email', 'member_password']);
        // $data = $request->except(['member_email', 'member_password']);
        // $data = $request->input('member_email');
        // $data = $request->member_email;
        // $data = $request->validate(['member_email' => ['required']]);
        $data = $request->validated();

        dd($data);
        // Die and Dump

    }
}
