
@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_perfil{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">EDITAR INFORMAÇÕES:</p>
    </div>
    <div class="row col-12 d-flex justify-content-center">

        <form class="col-9 p-0 mt-3"action="{{route("updateQualificacao")}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <div class="bg-light p-2 rounded mt-2 ">

                    <label  for="">Código RQS:</label>
                    <input type="text" class="form-control" id="" value="{{$soldadorQualificacao->cod_rqs}}" name="cod_rqs" required>

                    <input type="hidden" name="id_soldador" value="{{$soldadorQualificacao->soldador->id}}">
                    <input type="hidden" name="id" value="{{$soldadorQualificacao->id}}">
                    <label for="id_eps">EPS:</label>
                    <select class="form-control" id="id_eps" name="id_eps" required>
                        <option id="op1" value="{{$soldadorQualificacao->qualificacao->id_eps}}" selected>{{$soldadorQualificacao->qualificacao->eps->nome}}</option>

                        @foreach($epss as $eps)
                            <option value="{{$eps->id}}" name="id_eps">{{$eps->nome}}</option>
                        @endforeach
                    </select>
                    <label for="id_processo">Processo:</label>
                    <select class="form-control" id="id_processo" name="id_processo" required>
                        <option id="op1" value="{{$soldadorQualificacao->qualificacao->processo->id}}" selected>{{$soldadorQualificacao->qualificacao->processo->nome}}</option>

                        @foreach($processos as $processo)
                            <option value="{{$processo->id}}" name="id_processo">{{$processo->nome}}</option>
                        @endforeach
                    </select>


                    <label  for="descricao">Descrição:</label>
                    <textarea type="text" class="form-control" id="descricao" name="descricao" required>{{$soldadorQualificacao->qualificacao->descricao}}</textarea>

                    <label  for="data_qualificacao">Insira a data da qualificação:</label>
                    <input type="date" class="form-control" id="data_qualificacao" name="data_qualificacao" value="{{$soldadorQualificacao->data_qualificacao}}" required>

                    <label  for="nome">Nome da norma:</label>
                    <input type="text" class="form-control" id="nome" value="{{$soldadorQualificacao->qualificacao->norma->norma->nome}}" name="nome_norma" required>

                    <label  for="descricao">Descrição:</label>
                    <textarea type="text" class="form-control" id="descricao" name="descricao_norma" required>{{$soldadorQualificacao->qualificacao->norma->norma->descricao}}</textarea>

                    <label for="validade">Validade:</label>
                    <select name="validade" class="form-control" id="validade">
                        <option value="{{$soldadorQualificacao->qualificacao->norma->norma->validade}}" selected>
                            {{$soldadorQualificacao->qualificacao->norma->norma->validade}} meses
                        </option>
                        <option value="3">3 meses</option>
                        <option value="6">6 meses</option>
                        <option value="9">9 meses</option>
                        <option value="12">12 meses</option>
                        <option value="24">24 meses</option>
                        <option value="36">36 meses</option>
                    </select>


                </div>
                <input type="submit" class="btn btn-outline-primary mt-3 col-12" value="Salvar">
            </div>
        </form>
        <span class="col-9 p-0">
            <a href="{{route("paginaInicial")}}">            
                <button class="btn btn-outline-light btn-block text-dark mt-1  mb-2 col-12"><i class="fas fa-arrow-left"></i> Voltar</button>
            </a>
        </span>
    </div>


@endsection()
