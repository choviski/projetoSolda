<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;


class EpsAvancadaPreAquecimentoRequest extends FormRequest
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
            'temperatura_interpasse' => 'required|string',
            'temperatura' => 'required|string',
            'id_processo' => 'required|integer', 
        ];
    }

    public function messages(){
        return[
            'temperatura_interpasse.required' => "O campo 'Temperatura do interpasse' não pode ser nulo.",
            'temperatura_interpasse.string' => "O campo 'Temperatura do interpasse' deve conter texto.",
            'temperatura.required' => "O campo 'Temperatura' não pode ser nulo.",
            'temperatura.string' => "O campo 'Temperatura' deve conter texto.",
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
