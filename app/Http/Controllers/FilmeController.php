<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmeFormRequest;
use App\Http\Requests\FilmeFormRequestUpdate;
use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    // Cadastro de filme
    public function cadastroFilme(FilmeFormRequest $request)
    {
        $filme = Filme::create([

            'titulo' => $request->titulo,
            'diretor' => $request->diretor,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lancamento,
            'duracao' => $request->duracao,
            'sinopse' => $request->sinopse,
            'elenco' => $request->elenco,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Cadastrado com sucesso",
            "data" => $filme
        ], 200);
    }

    // pesquisar de filme
    public function pesquisa(Request $request)
    {
        $query = Filme::query();
        $query->where(function ($q) use ($request) {
            $q->where('sinopse', 'like', '%' . $request->input('pesquisa') . '%')
                ->orWhere('genero', 'like', '%' . $request->input('pesquisa') . '%');
        })
            ->where('titulo', 'like', '%' . $request->input('pesquisa') . '%');

        $filmes = $query->get();
        if (count($filmes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filmes
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Nenhum resultado encontrado"
        ]);
    }


    //FUNÇÃO DE EXCLUIR
    public function deletarFilme($filmes)
    {
        $filmes = Filme::find($filmes);
        if (!isset($filmes)) {
            return response()->json([
                'status' => false,
                'message' => "Filme não encontrado"
            ]);
        }
        $filmes->delete();
        return response()->json(([
            'status' => true,
            'message' =>  "Filme excluido com sucesso"
        ]));
    }

    //FUNÇÃO DE Update
    public function updateFilme(FilmeFormRequestUpdate $request)
    {
        $filmes = Filme::find($request->id);
        if (!isset($filmes)) {
            return response()->json([
                'status' => false,
                'message' => 'Filme não encontrado'
            ]);
        }
        if (isset($request->titulo)) {
            $filmes->titulo = $request->titulo;
        }
        if (isset($request->diretor)) {
            $filmes->diretor = $request->diretor;
        }
        if (isset($request->genero)) {
            $filmes->genero = $request->genero;
        }
        if (isset($request->dt_lancamento)) {
            $filmes->dt_lancamento = $request->dt_lancamento;
        }
        if (isset($request->duracao)) {
            $filmes->duracao = $request->duracao;
        }
        if (isset($request->sinopse)) {
            $filmes->sinopse = $request->sinopse;
        }
        if (isset($request->elenco)) {
            $filmes->elenco = $request->elenco;
        }
        if (isset($request->classificacao)) {
            $filmes->classificacao = $request->classificacao;
        }
        if (isset($request->plataformas)) {
            $filmes->plataformas = $request->plataformas;
        }

        $filmes->update();

        return response()->json([
            'status' => true,
            'message' => 'Filme ataulizado'
        ]);
    }


    //Listagem

    public function retornarTodos()
    {
        $filmes =  Filme::all();
        if (!isset($filmes)) {
            return response()->json([
                'status' => false,
                'message' => 'Não há registros no sistema'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $filmes
        ]);
    }



    
    public function pesquisarTitulo(Request $request)
    {
        $filmes = Filme::where('titulo', 'like', '%' . $request->titulo . '%')->get();
        
        if (count($filmes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filmes
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Nenhum stream foi encontrado'
        ]);
    }


    public function pesquisarSinopse(Request $request)
    {
        $filmes = Filme::where('sinopse', 'like', '%' . $request->sinopse . '%')->get();

        if (count($filmes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filmes
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Nenhum Stream foi encontrado'
        ]);
    }

    public function pesquisarDiretor(Request $request)
    {
        $filmes = Filme::where('diretor', 'like', '%' . $request->diretor . '%')->get();

        if (count($filmes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filmes
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Nenhum Stream foi encontrado'
        ]);
    }

    
}
