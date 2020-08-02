@extends('../../layouts/padrao')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">SOLDADORES - QUALIFICAÇÕES</a>
            <hr class="bg-white">
            <p class="lead text-white">Listagem</p>
        </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <form method="get" action="{{route("soldadorqualificacao.create")}}">
                @csrf
                <button class="btn btn btn-outline-primary mt-2">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($soldadorqualificacaos as $soldadorqualificacao)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$soldadorqualificacao->id}} |
                        Nome Soldador: {{$soldadorqualificacao->soldador->nome}} | Cod EPS: {{$soldadorqualificacao->qualificacao->cod_eps}}
                        <span class="d-flex">
                            <form method="get" action="/soldadorqualificacao/{{$soldadorqualificacao->id}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="/soldadorqualificacao/{{$soldadorqualificacao->id}}/edit/">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="/soldadorqualificacao/remover/{{$soldadorqualificacao->id}}" onsubmit="return confirm('Tem certeza que deseja excluir {{$soldadorqualificacao->nome}} ?')">
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
