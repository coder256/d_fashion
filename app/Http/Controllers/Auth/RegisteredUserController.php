<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^[\+]?(\d{10}|\d{12})$/'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'role' => ['required', 'string', 'max:25'],
            'password' => ['required', 'confirmed'],
            'shirt_sleeve' => ['nullable', 'numeric'],
            'chest' => ['nullable', 'numeric'],
            'thigh' => ['nullable', 'numeric'],
            'waist' => ['nullable', 'numeric'],
            'trouser_length' => ['nullable', 'numeric'],
        ]);

        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'role' => $request->get('role'),
            'shirt_sleeve' => $request->get('shirt_sleeve'),
            'chest' => $request->get('chest'),
            'thigh' => $request->get('thigh'),
            'waist' => $request->get('waist'),
            'trouser_length' => $request->get('trouser_length'),
            'password' => Hash::make($request->get('password')),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
