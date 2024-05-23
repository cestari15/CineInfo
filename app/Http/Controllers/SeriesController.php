<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmeFormRequest;
use App\Http\Requests\FilmeFormRequestUpdate;
use App\Http\Requests\SeriesFormRequest;
use App\Http\Requests\SeriesFormRequestUpdate;
use App\Models\Filme;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    // Cadastro de filme
    public function cadastroSerie(SeriesFormRequest $request)
    {
        $serie = Serie::create([

            'titulo' => $request->titulo,
            'diretor' => $request->diretor,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lancamento,
            'episodios' => $request->episodios,
            'sinopse' => $request->sinopse,
            'elenco' => $request->elenco,
            'classificacao' => $request->classificacao,
            'plataformas' => $request->plataformas,
            'studio'=>$request->studio,
        ]);
        return response()->json([
            "success" => true,
            "message" => "Stream com sucesso",
            "data" => $serie
        ], 200);
    }



    //FUNÇÃO DE EXCLUIR
    public function deletarSerie($serie)
    {
        $serie = Serie::find($serie);
        if (!isset($serie)) {
            return response()->json([
                'status' => false,
                'message' => "Stream não encontrado"
            ]);
        }
        $serie->delete();
        return response()->json(([
            'status' => true,
            'message' =>  "Stream excluido com sucesso"
        ]));
    }

    //FUNÇÃO DE Update
    public function updateSerie(SeriesFormRequestUpdate $request)
    {
        $serie = Serie::find($request->id);
        if (!isset($serie)) {
            return response()->json([
                'status' => false,
                'message' => 'Stream não encontrado'
            ]);
        }
        if (isset($request->titulo)) {
            $serie->titulo = $request->titulo;
        }
        if (isset($request->diretor)) {
            $serie->diretor = $request->diretor;
        }
        if (isset($request->genero)) {
            $serie->genero = $request->genero;
        }
        if (isset($request->dt_lancamento)) {
            $serie->dt_lancamento = $request->dt_lancamento;
        }
        if (isset($request->episodios)) {
            $serie->episodios = $request->episodios;
        }
        if (isset($request->sinopse)) {
            $serie->sinopse = $request->sinopse;
        }
        if (isset($request->elenco)) {
            $serie->elenco = $request->elenco;
        }
        if (isset($request->classificacao)) {
            $serie->classificacao = $request->classificacao;
        }
        if (isset($request->plataformas)) {
            $serie->plataformas = $request->plataformas;
        }
        if (isset($request->studio)) {
            $serie->studio = $request->studio;
        }

        $serie->update();

        return response()->json([
            'status' => true,
            'message' => 'Stream ataulizado'
        ]);
    }


    //Listagem

    public function retornarTodos()
    {
        $serie =  Serie::all();
        if (!isset($serie)) {
            return response()->json([
                'status' => false,
                'message' => 'Não há registros no sistema'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $serie
        ]);
    }

    // Pesquisas em geral

    public function pesquisar(Request $request)
    {
     
        $query = Filme::query();
       
        $query->where(function ($q) use ($request) {
            $q->where('sinopse', 'like', '%' . $request->input('pesquisa') . '%')
                ->orWhere('genero', 'like', '%' .$request->input('pesquisa') . '%')
                ->orWhere('diretor', 'like', '%' .$request->input('pesquisa') . '%')     
                ->orWhere('classificacao', 'like', '%' .$request->input('pesquisa') . '%')    
                ->orWhere('plataformas', 'like', '%' .$request->input('pesquisa') . '%')   
                ->orWhere('elenco', 'like', '%' .$request->input('pesquisa') . '%')   
                ->orWhere('titulo', 'like', '%' .$request->input('pesquisa') . '%');     
        });

        $serie = $query->get();
        if (count($serie) > 0) {
            return response()->json([
                'status' => true,
                'data' => $serie
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Nenhum resultado encontrado"
        ]);
    }

    
    
}
