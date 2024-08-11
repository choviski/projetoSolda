<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;


class EpsAvancadaCaracteristicasEletricasRequest extends FormRequest
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
            'tipo_corrente' => 'required|string',
            'polaridade' => 'required|string',
            'modo_transferencia'=> [
                'nullable',
                'required_if:tipo_corrente,"continua"',
                'string'
            ], 
            'velocidade' => 'required|integer',
            'camada' => 'required|string',//simples ou detalhada
            'camada_todas_amperes_li'=> [ //simples
                'nullable',
                'required_if:camada,"simples"',
                'numeric'
            ],
            'camada_todas_amperes_ls'=> [ //simples
                'nullable',
                'required_if:camada,"simples"',
                'numeric'
            ],
            'camada_todas_volts_li'=> [ //simples
                'nullable',
                'required_if:camada,"simples"',
                'numeric'
            ],
            'camada_todas_volts_ls'=> [ //simples
                'nullable',
                'required_if:camada,"simples"',
                'numeric'
            ],
            'camada_raiz_amperes_li'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_raiz_amperes_ls'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_raiz_volts_li'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_raiz_volts_ls'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],            
            'camada_acabamento_amperes_li'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_acabamento_amperes_ls'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_acabamento_volts_li'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_acabamento_volts_li'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_enchimento_amperes_li'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_enchimento_amperes_ls'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_enchimento_volts_li'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'camada_enchimento_volts_ls'=> [ //detalhada
                'nullable',
                'required_if:camada,"detalhada"',
                'numeric'
            ],
            'diametro_eletrodo_tig' => [
                'required_if:qual_processo,"TIG"',
                'numeric'
            ],
            'classificacao_consumivel_tig' => [
                'required_if:qual_processo,"TIG"',
                'numeric'
            ],
            'id_processo' => 'required|integer' 
        ];
    }

    public function messages(){
        return[
            'tipo_corrente.required' => "O campo 'Tipo de Corrente' não pode ser nulo.",
            'tipo_corrente.string' => "O campo 'Tipo de Corrente' deve conter texto.",
            'polaridade.required' => "O campo 'Polaridade' não pode ser nulo.",
            'polaridade.string' => "O campo 'Polaridade' deve conter texto.",
            'modo_transferencia.required_if' => "O campo 'Modo de Transferência' não pode ser nulo.",
            'velocidade.required' => "O campo 'Velocidade' não pode ser nulo.",
            'velocidade.integer' => "O campo 'Velocidade' deve conter apenas números.",
            'camada.required' => "O campo 'Camada' não pode ser nulo.",
            'camada.string' => "O campo 'Camada' deve conter texto.",
            'camada_todas_amperes_li.required_if' => "Preencha o limite inferior dos Amperes",
            'camada_todas_amperes_li.numeric' => "Preencha o limite inferior dos Amperes",
            'camada_todas_amperes_ls.required_if' => "Preencha o limite superior dos Amperes",
            'camada_todas_amperes_ls.numeric' => "Preencha o limite superior dos Amperes",
            'camada_todas_volts_li.required_if' => "Preencha o limite inferior dos Volts",
            'camada_todas_volts_li.numeric' => "Preencha o limite inferior dos Volts",
            'camada_todas_volts_ls.required_if' => "Preencha o limite superior dos Volts",
            'camada_todas_volts_ls.numeric' => "Preencha o limite superior dos Volts",
            'camada_raiz_amperes_li.required_if' => "Preencha o limite inferior dos Amperes (Raiz)",
            'camada_raiz_amperes_li.numeric' => "Preencha o limite inferior dos Amperes (Raiz)",
            'camada_raiz_amperes_ls.required_if' => "Preencha o limite superior dos Amperes (Raiz)",
            'camada_raiz_amperes_ls.numeric' => "Preencha o limite superior dos Amperes (Raiz)",
            'camada_raiz_volts_li.required_if' => "Preencha o limite inferior dos Volts (Raiz)",
            'camada_raiz_volts_li.numeric' => "Preencha o limite inferior dos Volts (Raiz)",
            'camada_raiz_volts_ls.required_if' => "Preencha o limite superior dos Volts (Raiz)",
            'camada_raiz_volts_ls.numeric' => "Preencha o limite superior dos Volts (Raiz)",
            'camada_acabamento_amperes_li.required_if' => "Preencha o limite inferior dos Amperes (Acabamento)",
            'camada_acabamento_amperes_li.numeric' => "Preencha o limite inferior dos Amperes (Acabamento)",
            'camada_acabamento_amperes_ls.required_if' => "Preencha o limite superior dos Amperes (Acabamento)",
            'camada_acabamento_amperes_ls.numeric' => "Preencha o limite superior dos Amperes (Acabamento)",
            'camada_acabamento_volts_li.required_if' => "Preencha o limite inferior dos Volts (Acabamento)",
            'camada_acabamento_volts_li.numeric' => "Preencha o limite inferior dos Volts (Acabamento)",
            'camada_acabamento_volts_ls.required_if' => "Preencha o limite superior dos Volts (Acabamento)",
            'camada_acabamento_volts_ls.numeric' => "Preencha o limite superior dos Volts (Acabamento)",
            'camada_enchimento_amperes_li.required_if' => "Preencha o limite inferior dos Amperes (Enchimento)",
            'camada_enchimento_amperes_li.numeric' => "Preencha o limite inferior dos Amperes (Enchimento)",
            'camada_enchimento_amperes_ls.required_if' => "Preencha o limite superior dos Amperes (Enchimento)",
            'camada_enchimento_amperes_ls.numeric' => "Preencha o limite superior dos Amperes (Enchimento)",
            'camada_enchimento_volts_li.required_if' => "Preencha o limite inferior dos Volts (Enchimento)",
            'camada_enchimento_volts_li.numeric' => "Preencha o limite inferior dos Volts (Enchimento)",
            'camada_enchimento_volts_ls.required_if' => "Preencha o limite superior dos Volts (Enchimento)",
            'camada_enchimento_volts_ls.numeric' => "Preencha o limite superior dos Volts (Enchimento)",
            'diametro_eletrodo_tig.required' => "O campo 'Diâmetro do eletredo tungstênio' não pode ser nulo.",
            'diametro_eletrodo_tig.numeric' => "O campo 'Diâmetro do eletredo tungstênio' deve conter texto.",
            'classificacao_consumivel_tig.required' => "O campo 'Composição do consumível de tungstênio' não pode ser nulo.",
            'classificacao_consumivel_tig.string' => "O campo 'Composição do consumível de tungstênio' deve conter texto.",
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
