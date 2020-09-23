
@extends('../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Norma-Qualificações:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
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
        <a href="/normaqualificacao"><button class="btn btn-outline-light mt-2 text-dark  "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection