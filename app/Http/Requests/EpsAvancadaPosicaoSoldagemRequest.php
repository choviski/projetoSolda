<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class EpsAvancadaPosicaoSoldagemRequest extends FormRequest
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
            'direcao_soldagem' => 'required|string',
            'posicao_soldagem' => 'required|string',
            'id_processo' => 'required|integer', 
        ];
    }

    public function messages(){
        return[
            'direcao_soldagem.required' => "O campo 'Direção de Soldagem' não pode ser nulo.",
            'direcao_soldagem.string' => "O campo 'Direção de Soldagem' deve conter texto.",
            'posicao_soldagem.required' => "O campo 'Posição de Soldagem' não pode ser nulo.",
            'posicao_soldagem.string' => "O campo 'Posição de Soldagem' deve conter texto.",
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
