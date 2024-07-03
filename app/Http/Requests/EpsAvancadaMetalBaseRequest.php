<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class EpsAvancadaMetalBaseRequest extends FormRequest
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
            'p_numero' => 'required|integer',
            'grupo_n' => 'required|integer',
            'tipo_grau' => 'required|string',
            'metal_base' => 'required|string',
            'tubo_ou_chapa' => 'required|string',
            'diametro_interno_tubo' => [
                'nullable',
                'required_if:tubo_ou_chapa,"Tubo"',
                'string'
            ],
            'diametro_externo_tubo' => [
                'nullable',
                'required_if:tubo_ou_chapa,"Tubo"',
                'string'
            ],
            'id_processo' => 'required|integer', 
        ];
    }

    public function messages(){
        return[
            'p_numero.required' => "O campo 'P número' não pode ser nulo.",
            'p_numero.integer' => "O campo 'P número' deve conter apenas números.",
            'grupo_n.required' => "O campo 'Grupo N' não pode ser nulo.",
            'grupo_n.integer' => "O campo 'Grupo N' deve conter apenas números",  
            'tipo_grau.required' => "O campo 'Tipo Grau' não pode ser nulo.",
            'tipo_grau.string' => "O campo 'Tipo Grau' deve conter texto.", 
            'metal_base.required' => "O campo 'Metal Base' não pode ser nulo.",
            'metal_base.string' => "O campo 'Metal Base' deve conter texto.",
            'tubo_ou_chapa.required' => "O campo 'Tubo ou Chapa?' não pode ser nulo.",
            'tubo_ou_chapa.string' => "O campo 'Tubo ou Chapa?' deve conter texto.",   
            'diametro_interno_tubo.required_if' => "O campo 'Diâmetro Interno do tubo' não pode ser nulo.",
            'diametro_interno_tubo.string' => "O campo 'Diâmetro Interno do tubo' deve conter texto.",
            'diametro_externo_tubo.required_if' => "O campo 'Diâmetro Externo do tubo' não pode ser nulo.",
            'diametro_externo_tubo.string' => "O campo 'Diâmetro Externo do tubo' deve conter texto.",            
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
