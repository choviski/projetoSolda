@extends('../../layouts/padraonovo')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->


    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Contato-Empresa:</p>
    </div>
    <!-- Conteudo da CRUD -->
    <div class="col-12">
            <form method="get" action="{{route("contatoEmpresa.create")}}">
                <a href="{{route("entidades")}}" class=" btn btn-outline-light mt-2 text-dark"><i class="fas fa-arrow-left"></i> Voltar</a>
                @csrf
                <button class=" btn btn-outline-light mt-2 text-dark">Adicionar</button>
            </form>
            <ul class="list-group">
                @foreach($contatoEmpresas as $contatoEmpresa)
                    <li class="list-group-item align-items-center d-flex justify-content-between mt-2">ID #{{$contatoEmpresa->id}} |
                        Contato {{$contatoEmpresa->contato->nome}} na Empresa {{$contatoEmpresa->empresa->nome_fantasia}}
                        <span class="d-flex">
                            <form method="get" action="{{Route("contatoEmpresa.show",['contatoEmpresa'=>$contatoEmpresa->id])}}">
                                @csrf
                                 <button class="btn btn-outline-primary mr-1"> <i class="fas fa-eye"></i></button>
                            </form>
                        <form method="get" action="{{route("contatoEmpresa.edit",['contatoEmpresa'=>$contatoEmpresa->id])}}">
                            @csrf
                            <button class="btn btn-outline-primary mr-1"> <i class="far fa-edit"></i> </button>
                        </form>
                        <form method="post" action="{{route("contatoEmpresa.remover",['id'=>$contatoEmpresa->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir o contato {{$contatoEmpresa->contato->nome}} na empresa {{$contatoEmpresa->empresa->razao_social}} ?')">
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
