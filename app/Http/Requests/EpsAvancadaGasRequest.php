<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;


class EpsAvancadaGasRequest extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'gas_protecao' => 'required|string',
            'composicao' => 'required|string',
            'vazao' => 'required|string', 
            'possui_purga' => 'required|integer',
            'purga' => [
                'nullable',
                'required_if:possui_purga,1',
                'string'
            ],
            'composicao_purga' => [
                'nullable',
                'required_if:possui_purga,1',
                'string'
            ],
            'vazao_purga' => [
                'nullable',
                'required_if:possui_purga,1',
                'string'
            ],
            'id_processo' => 'required|integer' 
        ];
    }

    public function messages(){
        return[
            'gas_protecao.required' => "O campo 'Gas proteção' não pode ser nulo.",
            'gas_protecao.string' => "O campo 'Gas proteção' deve conter texto.",
            'composicao.required' => "O campo 'Composição' não pode ser nulo.",
            'composicao.string' => "O campo 'Composição' deve conter texto.",
            'vazao.required' => "O campo 'Vazão' não pode ser nulo.",
            'vazao.string' => "O campo 'Vazão' deve conter texto.",
            'possui_purga.required' => "O campo 'Possui Purga' não pode ser nulo.",
            'possui_purga.integer' => "O campo 'Possui Purga' deve ser preenchido.",
            'purga.required_if' => "O campo 'Purga' não pode ser nulo.",
            'purga.string' => "O campo 'Purga' deve conter texto.",
            'composicao_purga.required_if' => "O campo 'Composição da Purga' não pode ser nulo.",
            'composicao_purga.string' => "O campo 'Composição da Purga' deve ser um inteiro.",
            'vazao_purga.required_if' => "O campo 'Vazão da Purga' não pode ser nulo.",
            'vazao_purga.string' => "O campo 'Vazão da Purga' deve conter apenas números.",
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
