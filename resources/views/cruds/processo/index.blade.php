@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">PROCESSOS</a>
            <hr class="bg-white">
            <p class="lead text-white">Listagem</p>
        </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <form method="get" action="{{route("processo.create")}}">
                <a href="/entidades" class="btn btn btn-outline-primary mt-2"><i class="fas fa-arrow-left"></i> Voltar</a>
                @csrf
                <button class="btn btn btn-outline-primary mt-2">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($processos as $processo)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$processo->id}} |
                        Nome: {{$processo->nome}}
                        <span class="d-flex">
                            <form method="get" action="/processo/{{$processo->id}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="/processo/{{$processo->id}}/edit/">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="/processo/remover/{{$processo->id}}" onsubmit="return confirm('Tem certeza que deseja excluir o processo {{$processo->nome}} ?')">
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
