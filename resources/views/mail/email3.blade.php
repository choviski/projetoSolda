@component('mail::message')
    <h1>{{$mensagem}}</h1>
    <p>
        Olá {{$dado->soldador->empresa->razao_social}}, gostariamos de informar que seu soldador, {{$dado->soldador->nome}}
        teve sua qualificacao ({{$dado->qualificacao->cod_eps}}) {{$m}}.
    </p>
    @component('mail::button')
        Acessar!
    @endcomponent
@endcomponent

