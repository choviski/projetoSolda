@extends('../../layouts/padraonovo')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->


        <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
            <hr>
            <p class="lead">Gerenciar Cidades:</p>
        </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <form method="get" action="{{route("cidade.create")}}">
                <a href="{{route("entidades")}}" class="btn btn btn-outline-light mt-2 text-dark"><i class="fas fa-arrow-left"></i> Voltar</a>
                @csrf
                <button class="btn btn btn-outline-light mt-2 text-dark ">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($cidades as $cidade)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$cidade->id}} |
                        Nome: {{$cidade->nome}}
                        <span class="d-flex">
                            <form method="get" action="{{Route('cidade.show',['cidade'=> $cidade->id])}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1 text-primary"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="{{Route('cidade.edit',['cidade'=> $cidade->id])}}">
                            @csrf
                            <button class="btn btn-outline-primary mr-1 text-primary"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="{{Route('cidade.remover',['id'=> $cidade->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir {{$cidade->nome}} ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-primary text-primary"><i class="fas fa-trash"  alt="Deletar"></i></button>
                        </form>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
