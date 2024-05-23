<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimacaoFormRequest;
use App\Http\Requests\FilmeFormRequest;
use App\Http\Requests\FilmeFormRequestUpdate;
use App\Http\Requests\SeriesFormRequest;
use App\Http\Requests\SeriesFormRequestUpdate;
use App\Models\Animacao;
use App\Models\Filme;
use App\Models\Serie;
use Illuminate\Http\Request;

class AnimacaoController extends Controller
{
    // Cadastro de filme
    public function cadastroAnimacao(AnimacaoFormRequest $request)
    {
        $animacao = Animacao::create([

            'titulo' => $request->titulo,
            'diretor' => $request->diretor,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lancamento,
            'episodios' => $request->episodios,
            'sinopse' => $request->sinopse,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
            'studio'=>$request->studio,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Stream cadastrado com sucesso",
            "data" => $animacao
        ], 200);
    }



    //FUNÇÃO DE EXCLUIR
    public function deletarAnimacao($animacao)
    {
        $animacao = Animacao::find($animacao);
        if (!isset($animacao)) {
            return response()->json([
                'status' => false,
                'message' => "Stream não encontrado"
            ]);
        }
        $animacao->delete();
        return response()->json(([
            'status' => true,
            'message' =>  "Stream excluido com sucesso"
        ]));
    }

    //FUNÇÃO DE Update
    public function updateAnimacao(AnimacaoFormRequest $request)
    {
        $animacao = Animacao::find($request->id);
        if (!isset($animacao)) {
            return response()->json([
                'status' => false,
                'message' => 'Stream não encontrado'
            ]);
        }
        if (isset($request->titulo)) {
            $animacao->titulo = $request->titulo;
        }
        if (isset($request->diretor)) {
            $animacao->diretor = $request->diretor;
        }
        if (isset($request->genero)) {
            $animacao->genero = $request->genero;
        }
        if (isset($request->dt_lancamento)) {
            $animacao->dt_lancamento = $request->dt_lancamento;
        }
        if (isset($request->episodios)) {
            $animacao->episodios = $request->episodios;
        }
        if (isset($request->sinopse)) {
            $animacao->sinopse = $request->sinopse;
        }
        if (isset($request->classificacao)) {
            $animacao->classificacao = $request->classificacao;
        }
        if (isset($request->plataformas)) {
            $animacao->plataformas = $request->plataformas;
        }
        if (isset($request->studio)) {
            $animacao->studio = $request->studio;
        }

        $animacao->update();

        return response()->json([
            'status' => true,
            'message' => 'Stream ataulizado'
        ]);
    }


    //Listagem

    public function retornarTodos()
    {
        $animacao =  Animacao::all();
        if (!isset($animacao)) {
            return response()->json([
                'status' => false,
                'message' => 'Não há registros no sistema'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $animacao
        ]);
    }

    // Pesquisas em geral

    public function pesquisar(Request $request)
    {
     
        $query = Animacao::query();
       
        $query->where(function ($q) use ($request) {
            $q->where('sinopse', 'like', '%' . $request->input('pesquisa') . '%')
                ->orWhere('genero', 'like', '%' .$request->input('pesquisa') . '%')
                ->orWhere('diretor', 'like', '%' .$request->input('pesquisa') . '%')     
                ->orWhere('classificacao', 'like', '%' .$request->input('pesquisa') . '%')    
                ->orWhere('plataformas', 'like', '%' .$request->input('pesquisa') . '%')   
                ->orWhere('titulo', 'like', '%' .$request->input('pesquisa') . '%');     
        });

        $animacao = $query->get();
        if (count($animacao) > 0) {
            return response()->json([
                'status' => true,
                'data' => $animacao
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Nenhum resultado encontrado"
        ]);
    }

    
    
}
