
@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_cadastro{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
        input[type="file"]{
            margin: 0px;
            padding: 0px;
            display: none;
        }
        #btnFoto{
            background-color: #59acff;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            font-weight: lighter;
            width: auto;
            display: block;
            text-align: center;
            transition: 0.3s ease;
        }
        #btnFoto:hover{
            background-color: #0275d8;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">RENOVAR QUALIFICAÇÃO:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <div class="col-md-9 col-sm-10 mt-2">
            <form action="{{Route('editarQualificacao',['id'=> $soldadorQualificacao->id])}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group bg-light p-2 rounded">
                <label  for="">Código RQS:</label><input type="text" class="form-control"  name="codRqs" value="{{$soldadorQualificacao->cod_rqs}}" required disabled>
                <input type="hidden" class="form-control" name="codRqs" value="{{$soldadorQualificacao->cod_rqs}}"  required disabled>

                <label for="id_soldador">Soldador:</label>
                <input type="text" class="form-control" id=""  value="{{$soldadorQualificacao->soldador->nome}}" required disabled>
                <input type="hidden" class="form-control" id=""  name="id_soldador" value="{{$soldadorQualificacao->soldador->id}}" required>

                <input type="hidden" class="form-control" id=""  name="oi" value="{{$soldadorQualificacao->cod_rqs}}" required>


                <label for="id_qualificacao">Código da Qualificação:</label>
                <input type="text" class="form-control" id=""  value="{{$soldadorQualificacao->qualificacao->id}}" required disabled>
                <input type="hidden" class="form-control" id=""  name="id_qualificacao" value="{{$soldadorQualificacao->qualificacao->id}}" required>
                <input type="hidden" class="form-control" id=""  name="data_qualificacao" value="{{$soldadorQualificacao->data_qualificacao}}" required>
                <input type="hidden" class="form-control" id=""  name="lancamento_qualificacao" value="{{$soldadorQualificacao->lancamento_qualificacao}}" required>
                <input type="hidden" class="form-control" id=""  name="validade_qualificacao" value="{{$soldadorQualificacao->validade_qualificacao}}" required>


                <label  for="data_qualificacao">Insira a data da qualificação:</label>
                <input type="date" class="form-control" id="data_qualificacao"  value="{{$soldadorQualificacao->data_qualificacao}}" required disabled>

                <label  for="validade_qualificacao">Insira a validade da qualificação:</label>
                <input type="date" class="form-control" id="validade_qualificacao"  value="{{$soldadorQualificacao->validade_qualificacao}}" required disabled>

                <label  for="lancamento_qualificacao">Insira o lançamento da qualificação:</label>
                <input type="date" class="form-control" id="lancamento_qualificacao"  value="{{$soldadorQualificacao->lancamento_qualificacao}}" required disabled>

                <input type="hidden" class="form-control" id="nome_certificado" placeholder="Insira o nome da certificado" name="nome_certificado"  value="{{$soldadorQualificacao->nome_certificado}}" required>
                <input type="hidden" class="form-control" id="nome_certificado" placeholder="Insira o nome da certificado" name="caminho_certificado"  value="{{$soldadorQualificacao->caminho_certificado}}" required>

                <label  for="nome_certificado">Posição de soldagem:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Insira a posição de soldagem" name="posicao" required>

                <label  for="nome_certificado">Eletrodo:</label>
                <input type="text" class="form-control" id="nome_certificado" placeholder="Insira o eletrodo ultilizado na soldagem" name="eletrodo" required>


                <label for="foto" id="labelFotos" class="mt-2 col-12 p-0">Insira a(s) foto(s) corpo de prova:</label>
                <label for="foto" id="btnFoto" class="">Escolha a(s) foto(s)</label>
                <input type="file" class="" id="foto" placeholder="Insira a(s) foto(s) corpo de prova:" name="fotos[]" multiple required>


                <label  for="descricao">Descrição do processo de soldagem:</label>
                <textarea type="text" class="form-control" id="descricao" placeholder="insira a descrição do processo que você ultilizou na soldagem" name="texto" required></textarea>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
            </form>
            <form method="POST" action="{{route("perfilSoldador")}}" class="">
                @csrf
                <input type="hidden" id="id_soldador" name="id_soldador" value="{{$soldadorQualificacao->soldador->id}}">
                <button class="btn btn-outline-light mt-1 mb-2 text-dark col-12"><i class="fas fa-arrow-left"></i> Voltar</button>
            </form>
            <a href="{{route("paginaInicial")}}">
        </div>
    </div>
    <script >
        $("#foto").on("change", function(){
            nFotos = document.getElementById('foto').files.length;
            if(nFotos>0){
                document.getElementById('btnFoto').innerHTML='Fotos escolhidas: '+nFotos;
                document.getElementById('btnFoto').style.backgroundColor='#0275d8';

            }else{
                document.getElementById('btnFoto').innerHTML='Escolha a(s) foto(s):';
                document.getElementById('btnFoto').style.backgroundColor='#59acff';
            }
        })
    </script>
@endsection
