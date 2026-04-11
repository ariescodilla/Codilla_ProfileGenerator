<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = session()->get('profiles,' []);
        return view('index', compact('profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'age' => 'required|integer',
            'program' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'hobbies' => 'required|array|min:5',
            'bio' => 'required'
        ]);

        $profiles = session()->get('profiles', []);

        $profiles[] = [
            'name'=> $request->name,
            'age'=> $request->age,
            'program'=> $request->program,
            'email'=> $request->email,
            'gender'=> $request->gender,
            'hobbies'=> $request->hobbies,
            'bio'=> $request->bio,
        ];

        session()->put('profiles', $profiles);

        return redirect('/');
    }

    public function clear()
    {
        session()->forget('profiles');
        return redirect('/');
    }
}
