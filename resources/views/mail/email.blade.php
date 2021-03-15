@component('mail::message')
    <h1>{{$mensagem}}</h1>
    <p>
        Olá {{$dado->soldador->empresa->razao_social}}, seu soldador, {{$dado->soldador->nome}} está com a qualificação
        {{$dado->qualificacao->cod_eps}} ({{$dado->qualificacao->descricao}}) prestes a vencer.
    </p>
    @component('mail::button')
        Requalificar!
    @endcomponent
@endcomponent

