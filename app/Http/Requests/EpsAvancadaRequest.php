<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class EpsAvancadaRequest extends FormRequest
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
            'nome' => "required|string",
            'data' => "required|date",
            'norma' => "required|string",
            'rqp' => "required|string",
            'goivagem' => "required|string",
            'martelamento' => "required|string",
            'cordoes' => "required|string",
            'eletrodo' => "required|string",
            'diametro_bocal' => "required|string",
            'espacamento_eletrodo' => "required|string",
            'oscilacao' => "required|string",
            'passes_simples_multiplos' => "required|string",
            'processo_termico' => "required|string",
            'processo_ids' => "required",
        ];
    }

    public function messages(){
        return[
            'processo_ids.required' => "É necessário ter pelo menos um processo vinculado à EPS.",
            'nome.required' => "O campo 'Nome' não pode ser nulo.",
            'nome.string' => "O campo 'Nome' deve conter texto.",
            'data.required' => "O campo 'Data' não pode ser nulo.",
            'data.date' => "O campo 'Data' deve ser uma data.",
            'norma.required' => "O campo 'Norma' não pode ser nulo.",
            'norma.string' => "O campo 'Norma' deve conter texto.",
            'rqp.required' => "O campo 'RQP' não pode ser nulo.",
            'rqp.string' => "O campo 'RQP' deve conter texto.",
            'goivagem.required' => "O campo 'Goivagem' não pode ser nulo.",
            'goivagem.string' => "O campo 'Goivagem' deve conter texto.",
            'martelamento.required' => "O campo 'Martelamento' não pode ser nulo.",
            'martelamento.string' => "O campo 'Martelamento' deve conter texto.",
            'cordoes.required' => "O campo 'Cordões' não pode ser nulo.",
            'cordoes.string' => "O campo 'Cordões' deve conter texto.",
            'eletrodo.required' => "O campo 'Eletrodo' não pode ser nulo.",
            'eletrodo.string' => "O campo 'Eletrodo' deve conter texto.",
            'diametro_bocal.required' => "O campo 'Diâmetro do bocal' não pode ser nulo.",
            'diametro_bocal.string' => "O campo 'Diâmetro do bocal' deve conter texto.",
            'espacamento_eletrodo.required' => "O campo 'Espaçamento entre eletrodos' não pode ser nulo.",
            'espacamento_eletrodo.string' => "O campo 'Espaçamento entre eletrodos' deve conter texto.",
            'oscilacao.required' => "O campo 'Oscilação' não pode ser nulo.",
            'oscilacao.string' => "O campo 'Oscilação' deve conter texto.",
            'passes_simples_multiplos.required' => "O campo 'Passes simples ou múltiplos' não pode ser nulo.",
            'passes_simples_multiplos.string' => "O campo 'Passes simples ou múltiplos' deve conter texto.",
            'processo_termico.required' => "O campo 'Processo térmico de preparação' não pode ser nulo.",
            'processo_termico.string' => "O campo 'Processo térmico de preparação' deve conter texto.",
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
