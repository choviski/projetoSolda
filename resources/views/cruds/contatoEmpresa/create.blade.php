
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Contato-Empresa:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{Route('contatoEmpresa.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">

                <label for="id_empresa">Empresa:</label>
                <select class="form-control" id="id_empresa" name="id_empresa" required>
                    <option value="-1">Selecione a empresa</option>

                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->nome_fantasia}}</option>
                    @endforeach
                </select>

                <label for="id_contato">Contato:</label>
                <select class="form-control" id="id_contato" name="id_contato" required>
                    <option value="-1">Selecione o Contato</option>

                    @foreach($contatos as $contato)
                        <option value="{{$contato->id}}">{{$contato->nome}}</option>
                    @endforeach
                </select>


                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="/contatoEmpresa"><button class="btn btn-outline-light mt-2 text-dark  "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection
