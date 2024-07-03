<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class EpsAvancadaPosAquecimentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'faixa_temperatura' => 'required|string',
            'taxa_aquecimento' => 'required|integer',
            'tempo_permanencia' => 'required|string',
            'taxa_resfriamento' => 'required|integer',
            'id_processo' => 'required|integer', 
        ];
    }

    public function messages(){
        return[
            'faixa_temperatura.required' => "O campo 'Faixa de Temperatura' não pode ser nulo.",
            'faixa_temperatura.string' => "O campo 'Faixa de Temperatura' deve conter texto.",
            'taxa_aquecimento.required' => "O campo 'Taxa de Aquecimento' não pode ser nulo.",
            'taxa_aquecimento.integer' => "O campo 'Taxa de Aquecimento' deve conter apenas números.",
            'tempo_permanencia.required' => "O campo 'Tempo de Permanencia' não pode ser nulo.",
            'tempo_permanencia.string' => "O campo 'Tempo de Permanencia' deve conter texto.",
            'taxa_resfriamento.required' => "O campo 'Taxa de Resfriamento' não pode ser nulo.",
            'taxa_resfriamento.integer' => "O campo 'Taxa de Resfriamento' deve conter apenas números.",
            'id_processo' => "É necessário ter um processo válido vinculado à posição de soldagem.",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'errors' => $errors
            ], 422)
        );
    }
}
