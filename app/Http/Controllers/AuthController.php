<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['username' => 'Username atau password salah.']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function edit(Request $request)
    {
        try {
            $credentials = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
                'new_password' => 'required|string',
                "name" => 'required|string'
            ]);


            $user = Auth::user();
            // dd($user);
            if (Hash::check($credentials['password'], $user->password)) {
                $user->update([
                    'password' => Hash::make($credentials['new_password']),
                    'username' => $credentials['username'],
                    'name' => $credentials['name']
                ]);

                return redirect('/dashboard')->with('success', 'Akun Anda telah diperbarui.');
            }

            return back()->with('error', 'Username atau password salah.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
