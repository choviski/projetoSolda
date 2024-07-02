<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class EpsAvancadaProcessoRequest extends FormRequest
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
            'qual_processo' => 'required|string',
            'tipo' => 'required|string',
        ];
    }

    public function messages(){
        return[
            'qual_processo.required' => "O campo 'Qual processo' não pode ser nulo.",
            'qual_processo.string' => "O campo 'Qual processo' deve conter texto.",
            'tipo.required' => "O campo 'Tipo' não pode ser nulo.",
            'tipo.string' => "O campo 'Tipo' deve conter texto.",
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
