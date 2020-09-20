
@extends('../../layouts/padrao')

@section('content')
    <div class="row d-flex justify-content-center ">
        <div class="col-12 bg-primary text-center shadow-sm ">
            <a class="text-white  display-4 ">NORMA - QUALIFICAÇÕES</a>
            <hr class="bg-white">
            <p class="lead text-white">Cadastro</p>
        </div>
        <form  class="col-12 mt-2" action="{{Route('normaqualificacao.store')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">

                <label for="id_norma">Norma:</label>
                <select class="form-control" id="id_norma" name="id_norma" required>
                    <option value="-1">Selecione a norma</option>

                    @foreach($normas as $norma)
                        <option value="{{$norma->id}}">{{$norma->nome}}</option>
                    @endforeach
                </select>

                <label for="id_qualificacao">Código RQS Qualificação:</label>
                <select class="form-control" id="id_qualificacao" name="id_qualificacao" required>
                    <option value="-1">Selecione a qualificação</option>

                    @foreach($qualificacaos as $qualificacao)
                        <option value="{{$qualificacao->id}}">código {{$qualificacao->processo->nome}}: {{$qualificacao->cod_eps}}</option>
                    @endforeach
                </select>



                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
    </div>
    <a href="/normaqualificacao"><button class="btn btn-outline-primary mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
@endsection