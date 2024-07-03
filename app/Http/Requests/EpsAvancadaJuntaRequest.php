<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;


class EpsAvancadaJuntaRequest extends FormRequest
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
            'imagem' => 'required|string',
            'imagem' => 'required|string',
            'cota_t' => 'required|string',
            'cota_r' => 'required|string', 
            'cota_f' => 'required|string',
            'qtd_angulos' => 'required|string',
            'angulo_primario' => 'required|string',
            'angulo_secundario' => [
                'nullable',
                'required_if:qtd_angulos,"2"',
                'string'
            ],
            'possui_cobre_junta' => 'required|integer',
            'material_cobre_junta' => [
                'nullable',
                'required_if:possui_cobre_junta,1',
                'string'
            ],
            'retentores' => 'required|integer', 
            'necessidade_remocao_cobre_junta' => 'required|integer', 
            'necessidade_remocao_retentor' => 'required|integer', 
            'id_processo' => 'required|integer' 
        ];
    }

    public function messages(){
        return[
            'imagem.required' => "O campo 'Imagem' não pode ser nulo.",
            'imagem.string' => "Uma imagem de junta deve ser selecionada.",
            'cota_t.required' => "O campo 'Cota T' não pode ser nulo.",
            'cota_t.string' => "O campo 'Cota T' deve conter texto.",
            'cota_r.required' => "O campo 'Cota R' não pode ser nulo.",
            'cota_r.string' => "O campo 'Cota R' deve conter texto.",
            'cota_f.required' => "O campo 'Cota F' não pode ser nulo.",
            'cota_f.string' => "O campo 'Cota F' deve conter texto.",
            'angulo_primario.required' => "O campo 'Ângulo do Bisel Primário' não pode ser nulo.",
            'angulo_primario.string' => "O campo 'Ângulo do Bisel Primário' deve conter texto.",
            'angulo_secundario.required_if' => "O campo 'Ângulo do Bisel Secundário' não pode ser nulo.",
            'angulo_secundario.string' => "O campo 'Ângulo do Bisel Secundário' deve ser um inteiro.",
            'possui_cobre_junta.required' => "O campo 'Necessidade de cobre junta?' não pode ser nulo.",
            'possui_cobre_junta.integer' => "O campo 'Necessidade de cobre junta?' deve conter apenas números.",
            'material_cobre_junta.required_if' => "O campo 'Material de cobre junta' não pode ser nulo.",
            'material_cobre_junta.string' => "O campo 'Material de cobre junta' deve conter texto.",
            'retentores.required' => "O campo 'Retentores' não pode ser nulo.",
            'retentores.integer' => "O campo 'Retentores' deve conter apenas números.",
            'necessidade_remocao_cobre_junta.required' => "O campo 'Precisa remoção cobre junta?' não pode ser nulo.",
            'necessidade_remocao_cobre_junta.integer' => "O campo 'Precisa remoção cobre junta?' deve conter apenas números.",
            'necessidade_remocao_retentor.required' => "O campo 'Precisa remoção de retentor?' não pode ser nulo.",
            'necessidade_remocao_retentor.integer' => "O campo 'Precisa remoção de retentor?' deve conter apenas números.", 
            'qtd_angulos' => "É preciso ter uma quantidade de ângulos definida para a junta.",
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
