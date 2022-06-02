<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
        //return view('dashboard.users.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $validated = $request->validate([
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
        if ($user->save()) {
            //session()->flash('message_success', 'User created successfully');
            return redirect('/dashboard/users')->with('message_success', 'User created successfully');
        } else {
            return back()->with('message_fail', 'User already exists');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorFail($id);
        return view('dashboard.users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->get('part') == 'data') {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name'  => ['required', 'string', 'max:255'],
                'tel'        => ['required', 'string', 'max:255'],
                'email'      => ['required', 'string', 'email', 'max:255'],
                'role'       => ['required', 'string'],
            ]);

            if ($user->update($request->all())) {
                session()->flash('message_success', 'User updated successfully.');
            } else {
                session()->flash('message_fail', 'User not updated successfully.');
            }
        } else {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);

            $result = $user->update(array(
                'password' => Hash::make($request->get('password'))
            ));

            if ($result) {
                session()->flash('message_success', 'User updated successfully.');
            } else {
                session()->flash('message_fail', 'User not updated successfully.');
            }
        }

        //return redirect('/user/' . $user->id . '/edit');
        return redirect('dashboard/users/' . $user->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Log::info($user);
        return redirect('/dashboard/users');
    }
}
