@extends('../../layouts/padrao')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">INSPETOR</a>
            <hr class="bg-white">
            <p class="lead text-white">Listagem</p>
        </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <form method="get" action="{{route("inspetor.create")}}">
                <a href="/entidades" class="btn btn btn-outline-primary mt-2"><i class="fas fa-arrow-left"></i> Voltar</a>
                @csrf
                <button class="btn btn btn-outline-primary mt-2">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($inspetores as $inspetor)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$inspetor->id}} |
                        Nome: {{$inspetor->nome}}
                        <span class="d-flex">
                            <form method="get" action="/inspetor/{{$inspetor->id}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="/inspetor/{{$inspetor->id}}/edit/">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="/inspetor/remover/{{$inspetor->id}}" onsubmit="return confirm('Tem certeza que deseja remover o inspetor {{$inspetor->nome}} ?')">
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
