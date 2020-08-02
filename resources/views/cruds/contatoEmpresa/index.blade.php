@extends('../../layouts/padrao')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">CONTATOS EM EMPRESAS</a>
            <hr class="bg-white">
            <p class="lead text-white">Listagem</p>
        </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <form method="get" action="{{route("contatoEmpresa.create")}}">
                @csrf
                <button class="btn btn btn-outline-primary mt-2">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($contatoEmpresas as $contatoEmpresa)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$contatoEmpresa->id}} |
                        Contato {{$contatoEmpresa->contato->nome}} na Empresa {{$contatoEmpresa->empresa->razao_social}}
                        <span class="d-flex">
                            <form method="get" action="/contatoEmpresa/{{$contatoEmpresa->id}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="/contatoEmpresa/{{$contatoEmpresa->id}}/edit/">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="/contatoEmpresa/remover/{{$contatoEmpresa->id}}" onsubmit="return confirm('Tem certeza que deseja excluir o contato {{$contatoEmpresa->contato->nome}} na empresa {{$contatoEmpresa->empresa->razao_social}} ?')">
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
