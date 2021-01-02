@component('mail::message')
    <h1> SUA QUALIFICAÇÃO IRÁ VENCER EM {{$dado->tempo}} DIA(S)!!</h1>
    <p>
        Olá {{$dado->soldador->empresa->razao_social}}, seu soldador, {{$dado->soldador->nome}} está com a qualificação
        {{$dado->qualificacao->cod_eps}} ({{$dado->qualificacao->descricao}}) prestes a vencer.
    </p>
    <form method="post" action="{{route("requalificar")}}" class="form-group" >
        @csrf
        {{ csrf_field() }}
        <input type="hidden" value="{{$dado->id}}" name="soldadorQualificacao">
        <input type="submit" class="ml-1 btn btn-secondary btn-sm" value="Requalificar">
    </form>
@endcomponent

