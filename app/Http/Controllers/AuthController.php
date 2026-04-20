<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showRegister(){
      return view('register');
    }

    public function showLogin(){
      return view('login');
    } 


    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'regex:/^[A-Za-z]+$/'],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,user'
        ]);

        User::create([
            'name' => trim($request->name),
            'email' => trim($request->email),
            'password' => Hash::make($request->password),
            'role' => $request->role
        ],[
            'email.unique' => 'User already exists, please login'
        ]);

        return redirect()->route('login')->with('success', 'Welcome '.$request->name.', please login');
    }
    
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found')->withInput();
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Wrong password')->withInput();
        }

        // Role redirect
        if ($user->role === 'admin') {
            return redirect('/dashboard');
        } else {
            return redirect('/home');
        }
    }

    public function logout(Request $request){
     Auth::logout();
     return redirect('/login');
    }
}
