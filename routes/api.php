<?php

use App\Http\Controllers\AnimacaoController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// FILMES

route::post('filmes/cadastro', [FilmeController::class, 'cadastroFilme']);
route::get('filmes/listagem', [filmeController::class, 'retornarTodos']);
route::delete('filmes/delete/{id}', [filmeController::class, 'deletarFilme']);
route::put('filmes/update', [filmeController::class, 'updateFilme']);
route::get('filmes/pesquisar', [filmeController::class, 'pesquisar']);


//SERIES
route::post('series/cadastro', [SeriesController::class, 'cadastroSerie']);
route::get('series/listagem', [SeriesController::class, 'retornarTodos']);
route::get('series/pesquisa', [SeriesController::class, 'pesquisar']);
route::delete('series/delete/{id}', [SeriesController::class, 'deletarSerie']);
route::put('series/update', [SeriesController::class, 'updateSerie']);



//ANIMAÇÕES
route::post('animacao/cadastro', [AnimacaoController::class, 'cadastroAnimacao']);
route::get('animacao/listagem', [AnimacaoController::class, 'retornarTodos']);
route::get('animacao/pesquisa', [AnimacaoController::class, 'pesquisar']);
route::delete('animacao/delete/{id}', [AnimacaoController::class, 'deletarAnimacao']);
route::put('animacao/update', [AnimacaoController::class, 'updateAnimacao']);



