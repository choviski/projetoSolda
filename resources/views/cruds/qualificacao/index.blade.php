@extends('../../layouts/padraonovo')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->


    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Qualificações:</p>
    </div>
    <!-- Conteudo da CRUD -->
    <div class="col-12">
            <form method="get" action="{{route("qualificacao.create")}}">
                <a href="{{route("entidades")}}" class="btn  btn-outline-light mt-2 text-dark"><i class="fas fa-arrow-left"></i> Voltar</a>
                @csrf
                <button class="btn  btn-outline-light mt-2 text-dark">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($qualificacoes as $qualificacao)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$qualificacao->id}} |
                        Código {{$qualificacao->processo->nome}}: {{$qualificacao->cod_eps}}
                        <span class="d-flex">
                            <form method="get" action="/qualificacao/{{$qualificacao->id}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="/qualificacao/{{$qualificacao->id}}/edit/">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="/qualificacao/remover/{{$qualificacao->id}}" onsubmit="return confirm('Tem certeza que deseja excluir a qualificação {{$qualificacao->cod_eps}} ?')">
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
