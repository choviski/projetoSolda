@extends('../../layouts/padraonovo')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->


    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Endereços:</p>
    </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <form method="get" action="{{route("endereco.create")}}">
                <a href="{{route("entidades")}}" class="btn btn btn-outline-light mt-2 text-dark"><i class="fas fa-arrow-left"></i> Voltar</a>
                @csrf
                <button class="btn btn btn-outline-light mt-2 text-dark">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($enderecos as $endereco)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$endereco->id}} |
                        Rua: {{$endereco->rua}} | Bairro: {{$endereco->bairro}}
                        <span class="d-flex">
                            <form method="get" action="/endereco/{{$endereco->id}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="/endereco/{{$endereco->id}}/edit/">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="/endereco/remover/{{$endereco->id}}" onsubmit="return confirm('Tem certeza que deseja excluir {{$endereco->rua}}, {{$endereco->bairro}} ?')">
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
