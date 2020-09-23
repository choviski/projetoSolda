@extends('../../../../layouts/padraonovo')

@section('content')
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Norma-Qualificações:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">
        <form class="col-12 mt-2"action="{{Route('normaqualificacao.update',['normaqualificacao'=> $normaqualificacao->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">

                <label for="id_norma">Norma:</label>
                <select class="form-control" id="id_norma" name="id_norma" required>
                    <option value="{{$normaqualificacao->id_norma}}">{{$normaqualificacao->norma->nome}}</option>

                    @foreach($normas as $norma)
                        <option value="{{$norma->id}}">{{$norma->nome}}</option>
                    @endforeach
                </select>

                <label for="id_qualificacao">Código EPS da Qualificação:</label>
                <select class="form-control" id="id_qualificacao" name="id_qualificacao" required>
                    <option value="{{$normaqualificacao->id_qualificacao}}">{{$normaqualificacao->qualificacao->cod_eps}}</option>

                    @foreach($qualificacaos as $qualificacao)
                        <option value="{{$qualificacao->id}}">{{$qualificacao->cod_eps}}</option>
                    @endforeach
                </select>


                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="/normaqualificacao"><button class="btn btn-outline-light text-dark mt-2 "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection