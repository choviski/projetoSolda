@extends('../../layouts/padrao')

@section('content')
    <!-- "Header" | Vai ficar embaixo do cabeçalho (quando tiver um) -->
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">ENTIDADES</a>
            <hr class="bg-white">
            <p class="lead text-white">Gerenciar entidades:</p>
        </div>
        <!-- Conteudo da CRUD -->
        <div class="col-12">
            <ul class="list-group" >
                <a href="/cidade" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Cidades</li></a>
                <a href="/contato" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Contatos</li></a>
                <a href="/empresa" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Empresa</li></a>
                <a href="/contatoEmpresa" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Empresa-Contato</li></a>
                <a href="/endereco" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Endereços</li></a>
                <a href="/inspetor" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Inspetores</li></a>
                <a href="/norma" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Normas</li></a>
                <a href="/normaqualificacao" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Norma-Qualificação</li></a>
                <a href="/qualificacao" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Qualificações</li></a>
                <a href="/soldador" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Soldadores</li></a>
                <a href="/soldadorqualificacao" style="text-decoration:none"><li class="list-group-item rounded bg-primary text-white shadow-sm mt-2">Soldador-Qualificação</li></a>
            </ul>
        </div>
    </div>
@endsection
