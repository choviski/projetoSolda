@component('mail::message')
    <h1>{{$mensagem}}</h1>
    <p>
        Olá Infosolda, gostariamos de informar que o soldador, {{$dado->soldador->nome}}
        fez o requerimento da requalificação ({{$dado->qualificacao->cod_eps}}).
    </p>
    @component('mail::button')
        Acessar!
    @endcomponent
@endcomponent

