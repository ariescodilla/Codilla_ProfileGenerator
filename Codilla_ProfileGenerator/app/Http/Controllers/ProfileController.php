<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = session()->get('profiles', []);
        return view('profiles.index', compact('profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'program' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'hobbies' => 'required|array|min:5',
            'bio' => 'required'
        ]);

        $profiles = session()->get('profiles', []);
        $profiles[] = $request->all();

        session()->put('profiles', $profiles);

        return redirect()->route('profiles.index');
    }

    public function clear()
    {
        session()->forget('profiles');
        return redirect()->route('profiles.index');
    }
}