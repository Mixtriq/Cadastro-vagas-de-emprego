<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VagaController extends Controller
{
    public function index()
    {
        $response = Http::timeout(60)->get('http://127.0.0.1:8001/api/vagas/');
        
        if ($response->successful()) {
            $vagas = $response->json();
        } else {
            $vagas = [];
        }

        return view('vagas.index', compact('vagas'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'descricao' => 'required|string',
            'salario' => 'required|numeric',
        ]);

        $response = Http::post('http://127.0.0.1:8001/api/vagas/', [
            'titulo' => $request->titulo,
            'empresa' => $request->empresa,
            'descricao' => $request->descricao,
            'salario' => $request->salario,
        ]);

        if ($response->successful()) {
            return redirect('/')->with('success', 'Vaga cadastrada com sucesso!');
        } else {
            return back()->with('error', 'Erro ao cadastrar a vaga.');
        }
    }
}

