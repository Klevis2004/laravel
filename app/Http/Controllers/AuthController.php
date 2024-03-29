<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Login;
use App\Http\Requests\Users;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth as AuthRequest;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login'); 
    }

    public function register(){
        return view('auth.register'); 
    }  
    public function store(Users $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        return redirect()->route('login')->with('success', 'The user was registered successfully!');
    }
    
    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/');
        }
    
        return back()->withErrors(['message' => 'Invalid login credentials.']);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.contain.settings', ['user' => $user]);
    }
    
    public function update(AuthRequest $request)
    {
        $validated = $request->validated();
    
        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('photos', 'public');
            $validated['profile_photo'] = $photoPath;
        }
        $userId = Auth::user()->id;
        
        $user = User::findOrFail($userId);
    
        $user->fill($validated);
        $user->save();
    
        return redirect()->route('welcome')->with('success', 'The user profile was updated successfully!');
    }
    
}
