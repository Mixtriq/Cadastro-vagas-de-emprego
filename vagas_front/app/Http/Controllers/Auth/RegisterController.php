<?php 

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $response = Http::post('http://127.0.0.1:8001/api/register/', [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);

        if ($response->successful()) {
          return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
        } else {
          return back()->withErrors(['error' => 'Erro ao cadastrar usuário. Tente novamente.']);
        }
    }
}
