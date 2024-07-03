<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class EpsAvancadaMetalAdicaoRequest extends FormRequest
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
            'f_numero' => 'required|integer',
            'a_numero' => 'required|integer',
            'diametro_consumivel' => 'required|string',
            'metal_depositado' => 'required|string',
            'possui_metal_suplementar' => 'required|integer',
            'metal_suplementar' => [
                'nullable',
                'required_if:possui_metal_suplementar,1',
                'string'
            ],
            'classificacao_aws' => 'required|string', 
            'forma_consumivel' => 'required|string', 
            'suporte' => 'required|string', 
            'material_suporte' => 'required|string', 
            'marca_material' => 'required|string', 
            'id_processo' => 'required|integer', 
        ];
    }

    public function messages(){
        return[
            'f_numero.required' => "O campo 'F número' não pode ser nulo.",
            'f_numero.integer' => "O campo 'F número' deve conter apenas números.",
            'a_numero.required' => "O campo 'A número' não pode ser nulo.",
            'a_numero.integer' => "O campo 'A número' deve conter apenas números",  
            'diametro_consumivel.required' => "O campo 'Diâmetro do Consumível' não pode ser nulo.",
            'diametro_consumivel.string' => "O campo 'Diâmetro do Consumível' deve conter texto.", 
            'metal_depositado.required' => "O campo 'Metal Depositado' não pode ser nulo.",
            'metal_depositado.string' => "O campo 'Metal Depositado' deve conter texto.",
            'possui_metal_suplementar.required' => "O campo 'Metal de adição suplementar' não pode ser nulo.",
            'possui_metal_suplementar.number' => "O campo 'Metal de adição suplementar' ser selecionado.",   
            'metal_suplementar.required_if' => "O campo 'Metal Suplementar' não pode ser nulo.",
            'metal_suplementar.string' => "O campo 'Metal Suplementar' deve conter texto.",
            'classificacao_aws.required' => "O campo 'Classificação AWS/S.F.A' não pode ser nulo.",
            'classificacao_aws.string' => "O campo 'Classificação AWS/S.F.A' deve conter texto.",            
            'forma_consumivel.required' => "O campo 'Forma do Consumível' não pode ser nulo.",
            'forma_consumivel.string' => "O campo 'Forma do Consumível' deve conter texto.",            
            'suporte.required' => "O campo 'Suporte' não pode ser nulo.",
            'suporte.string' => "O campo 'Suporte' deve conter texto.",            
            'material_suporte.required' => "O campo 'Material do Suporte' não pode ser nulo.",
            'material_suporte.string' => "O campo 'Material do Suporte' deve conter texto.",            
            'marca_material.required' => "O campo 'Marca comercial' não pode ser nulo.",
            'marca_material.string' => "O campo 'Marca comercial' deve conter texto.",            
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
