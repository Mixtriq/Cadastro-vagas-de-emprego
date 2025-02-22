<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $response = Http::post('http://127.0.0.1:8001/api/token/', [
        'username' => $request->email,
        'password' => $request->password,
    ]);


    if ($response->successful()) {
        $token = $response->json()['access'];
        session(['jwt_token' => $token]);

        return redirect()->route('dashboard');
    } else {
        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }
}
