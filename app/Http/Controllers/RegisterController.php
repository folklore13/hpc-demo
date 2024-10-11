<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:8',
            'email' => 'required|email|min:8',
            'password' => 'required|string|min:8',
            'role' => 'required|string'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role']
        ]);

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            Alert::success('Berhasil!', 'User berhasil didaftarkan');
            return redirect()->intended('/');
        }

        Alert::error('Gagal daftar', 'Data tidak berhasil ditambahkan. Coba lagi.');

        return redirect()->to('/login');
    }
}
