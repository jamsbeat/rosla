<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'      => ['required'],
            'email'      => ['required', 'email'],
            'phone'      => ['required', 'string'],
            'password'   => ['required', Password::min(6), 'confirmed'],

        ]);

        $user = User::create($attributes);

        Auth::login($user);

        // Mail::to($user)->queue(
        //     new WelcomeUser($user)
        // );

        return redirect('/');
    }
}
