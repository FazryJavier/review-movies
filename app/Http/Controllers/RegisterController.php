<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request) {
        // return request()->all();

        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:16'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login') -> with('success','Registration successfully!');
    }
}
