@extends('../../layouts/padraonovo')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->


    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Empresa:</p>
    </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <form method="get" action="{{route("empresa.create")}}">
                <a href="{{route("entidades")}}" class=" btn btn-outline-light mt-2 text-dark"><i class="fas fa-arrow-left"></i> Voltar</a>
                @csrf
                <button class="btn  btn-outline-light mt-2 text-dark">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($empresas as $empresa)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$empresa->id}} |
                        Nome: {{$empresa->razao_social}}
                        <span class="d-flex">
                            <form method="get" action="/empresa/{{$empresa->id}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="/empresa/{{$empresa->id}}/edit/">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="/empresa/remover/{{$empresa->id}}" onsubmit="return confirm('Tem certeza que deseja remover a empresa {{$empresa->razao_social}} ?')">
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
