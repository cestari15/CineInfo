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

    // Pesquisas em geral

    public function pesquisaFilme($pesquisa)
    {
     
        $query = Filme::query();
       
        $query->where(function ($q) use ($pesquisa) {
            $q->where('sinopse', 'like', '%' . $pesquisa . '%')
                ->orWhere('genero', 'like', '%' .$pesquisa . '%')
                ->orWhere('diretor', 'like', '%' .$pesquisa . '%')     
                ->orWhere('classificacao', 'like', '%' .$pesquisa . '%')    
                ->orWhere('plataformas', 'like', '%' .$pesquisa . '%')   
                ->orWhere('elenco', 'like', '%' .$pesquisa . '%')   
                ->orWhere('titulo', 'like', '%' .$pesquisa . '%');     
        });

        $filme = $query->get();
        if (count($filme) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filme
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Nenhum resultado encontrado"
        ]);
    }


  
}
