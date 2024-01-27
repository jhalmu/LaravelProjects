<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // get index page
    public function index()
    {
        return view('auth.register');
    }

    // store data
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:2|max:60',
            'name' => 'required|min:2|max:60',
            'email' => 'required|email|max:60',
            'password' => 'required|confirmed|min:8',
        ]);

         User::create([
             'username' => $request->username,
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
         // sign the user in
        auth()->attempt($request->only('email', 'password'));

         // redirect
         return redirect()->route('dashboard');



    }
}
