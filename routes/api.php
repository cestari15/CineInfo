<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::post('filmes/cadastro', [FilmeController::class, 'cadastroFilme']);
route::get('filmes/listagem', [filmeController::class, 'retornarTodos']);
route::get('filmes/pesquisar/titulo', [filmeController::class, 'pesquisarPorTitulo']);
route::get('filmes/diretor/pesquisar', [filmeController::class, 'pesquisarPorDiretor']);
route::get('filmes/genero/pesquisar', [filmeController::class, 'pesquisarPorGenero']);
route::delete('filmes/delete/{id}', [filmeController::class, 'excluir']);
route::put('filmes/update', [filmeController::class, 'update']);
