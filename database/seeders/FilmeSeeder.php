<?php

namespace Database\Seeders;

use App\Models\Filme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 5; $i++){
            Filme::create([
                'titulo' => 'titulo'.$i,
                'diretor' => 'diretor'.$i,
                'genero' => 'genero'.$i,
                'dt_lancamento' => '2000-01-01',
                'sinopse' => 'sinopse'.$i,
                'elenco' => 'elenco'.$i,
                'classificacao' => 'livre',
                'plataformas' => 'plataformas'.$i,
                'duracao' => '01:30:00',
                
            ]);
        }
    }
}
