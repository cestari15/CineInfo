<?php

use App\Http\Controllers\FilmeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::post('cadastro', [FilmeController::class, 'cadastroFilme']);
route::get('listagem', [filmeController::class, 'retornarTodos']);
route::get('pesquisar/titulo', [filmeController::class, 'pesquisarPorTitulo']);
route::get('pesquisar/diretor', [filmeController::class, 'pesquisarPorDiretor']);
route::get('pesquisar/genero', [filmeController::class, 'pesquisarPorGenero']);
route::delete('delete/{id}', [filmeController::class, 'excluir']);
route::put('update', [filmeController::class, 'update']);
