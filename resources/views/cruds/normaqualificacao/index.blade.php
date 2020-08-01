@extends('../../layouts/padrao')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">NORMAS - QUALIFICAÇÃO</a>
            <hr class="bg-white">
            <p class="lead text-white">Listagem</p>
        </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <form method="get" action="{{route("normaqualificacao.create")}}">
                @csrf
                <button class="btn btn btn-outline-primary mt-2">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($normaqualificacaos as $normaqualificacao)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$normaqualificacao->id}} |
                        Norma: {{$normaqualificacao->norma->nome}} | Código EPS da Qualificação: {{$normaqualificacao->qualificacao->cod_eps}}
                        <span class="d-flex">
                            <form method="get" action="/normaqualificacao/{{$normaqualificacao->id}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="/normaqualificacao/{{$normaqualificacao->id}}/edit/">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="/normaqualificacao/remover/{{$normaqualificacao->id}}" onsubmit="return confirm('Tem certeza que deseja excluir {{$normaqualificacao->rua}} ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-primary"><i class="fas fa-trash"  alt="Deletar"></i></button>
                        </form>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
