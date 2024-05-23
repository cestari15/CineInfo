<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SeriesFormRequestUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|max:100|min:2|unique:series,titulo,'. $this->id,
            'diretor' => 'required|max:100|min:3',
            'genero' => 'required|max:100|min:3',
            'dt_lancamento' => 'required|date',
            'sinopse' => 'required|max:10000|min:3',
            'elenco' => 'required|max:100|min:3',
            'classificacao' => 'required|max:15|min:2',
            'plataformas' => 'required|max:255|min:5',
            'episodios' => 'required|',
            'studio'=> 'required|max:50|min:2'
        ];
    }


    public function failedValidation(Validator $validator)
    {
        
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
          
            'titulo.max' => 'O campo Título deve ter no máximo 100 caractéris',
            'titulo.min' => 'O campo Título deve ter no mínimo 2 caractéris',
            'titulo.unique' => 'Titulo já existe no sistema',

          
            'diretor.max' => 'O campo Diretor deve ter no máximo 100 caractéris',
            'diretor.min' => 'O campo Diretor deve ter no mínimo 3 caractéris',

            'genero.max' => 'O campo Gênero deve ter no máximo 100 caractéris',
            'genero.min' => 'O campo Gênero deve ter no mínimo 3 caractéris',

            'dt_lancamento.date' => 'Data de Lançamento do Stream está em formato incorreto',

            'sinopse.max' => 'O campo Sinopse deve ter no máximo 10.000 caractéris',
            'sinopse.min' => 'O campo Sinopse deve ter no mínimo 3 caractéris',

            'elenco.max' => 'O campo Elenco deve ter no máximo 100 caractéris',
            'elenco.min' => 'O campo Elenco deve ter no mínimo 3 caractéris',

            'classificacao.max' => 'O campo Classificação deve ter no máximo 15 caractéris',
            'classificacao.min' => 'O campo Classificação deve ter no mínimo 2 caractéris',

            'plataformas.max' => 'O campo Plataforma deve ter no máximo 255 caractéris',
            'plataformas.min' => 'O campo Plataforma deve ter no mínimo 5 caractéris',



    
            'studio.max' => 'O campo Studio deve ter no máximo 50 caractéris',
            'studio.min' => 'O campo Studio deve ter no mínimo 2 caractéris',
        ];
    }
}
