<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmeFormRequest;
use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{

    // Cadastro de filme
    public function cadastroFilme(FilmeFormRequest $request)
    {
        $filme = Filme::create([
            'titulo:' => $request->titulo,
            'diretor' => $request->diretor,
            'genero' => $request->genero,
            'dt_lancamento' => $request->dt_lançamento,
            
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

// pesquisar Titulo

    public function pesquisarPorTitulo(Request $request)
    {
        $filme = Filme::where('titulo', 'like', '%' . $request->titulo . '%')->get();
        if (count($filme)) {

            return response()->json([
                'status' => true,
                'data' => $filme
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }


    //PESQUISA POR DIRETOR
    public function pesquisarPorDiretor(Request $request)
    {
        $filme = Filme::where('diretor', 'like', '%' . $request->diretor . '%')->get();
        if (count($filme) > 0) {
            return response()->json([
                'status' => true,
                'data' => $filme
            ]);
        }
        return response()->json([
            'status' => false,
            'data' => "Não foi encontrado nenhuma produção"
        ]);
    }






  //PESQUISA POR GENERO
  public function pesquisarPorGenero(Request $request)
  {
      $filme = Filme::where('genero', 'like', '%' . $request->genero . '%')->get();
      if (count($filme) > 0) {
          return response()->json([
              'status' => true,
              'data' => $filme
          ]);
      }
      return response()->json([
          'status' => false,
          'data' => "Não foi encontrado nenhuma produção"
      ]);
  }







//PESQUISA POR Genero
public function pesquisarPorSinopse(Request $request)
{
    $filme = Filme::where('sinopse', 'like', '%' . $request->sinopse . '%')->get();
    if (count($filme) > 0) {
        return response()->json([
            'status' => true,
            'data' => $filme
        ]);
    }
    return response()->json([
        'status' => false,
        'data' => "Não foi encontrado nenhuma produção"
    ]);
}







}