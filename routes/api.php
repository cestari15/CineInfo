<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// FILMES

route::post('filmes/cadastro', [FilmeController::class, 'cadastroFilme']);
route::get('filmes/listagem', [filmeController::class, 'retornarTodos']);
route::delete('filmes/delete/{id}', [filmeController::class, 'deletarFilme']);
route::put('filmes/update', [filmeController::class, 'updateFilme']);
route::get('filmes/pesquisar', [filmeController::class, 'pesquisar']);



