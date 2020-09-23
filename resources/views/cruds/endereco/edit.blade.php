
@extends('../../layouts/padraonovo')

@section('content')


    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidadeAjax").val("");
            }
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {
                //Nova variável "cep" somente com dígitos.
                console.log($("#cep").val());
                var cepJS = $("#cep").val();
                var cepJS = $(this).val().replace(/\D/g, '');
                console.log(cepJS);
                //Verifica se campo cep possui valor informado.
                if (cepJS != "") {
                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validacep.test(cepJS)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidadeAjax").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cepJS +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidadeAjax").val(dados.localidade);
                                //ajaxzada
                                var cidade = $("#cidadeAjax").val();
                                $.ajax({
                                    type:"POST",
                                    url:"{{route("acharCidade")}}",  data:{"cidade": cidade, "_token": "{{ csrf_token() }}"},
                                    success:function (data) {
                                        console.log(cidade);
                                        console.log(data);
                                        $("#op1").val(((data["id"])));
                                        $("#op1").text(((data["nome"]))+", "+((data["estado"])));
                                    }
                                });

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr>
        <p class="lead">Gerenciar Endereços:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center ">
        <form class="col-12 mt-2"action="{{Route('endereco.update',['endereco'=> $endereco->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">
                <label  for="cep">CEP:</label>
                <input type="text" class="form-control" id="cep" value="{{$endereco->cep}}" name="cep" required>

                <label  for="rua">Rua:</label>
                <input type="text" class="form-control" id="rua" value="{{$endereco->rua}}" name="rua" required>

                <label  for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" value="{{$endereco->bairro}}" name="bairro" required>

                <label  for="complemento">Complemento:</label>
                <input type="text" class="form-control" id="complemento" value="{{$endereco->complemento}}" name="complemento" required>


                <label for="id_cidade">Cidade:</label>
                <select class="form-control" id="id_cidade" name="id_cidade" required>
                    <option id="op1" value="{{$endereco->cidade->id}}">{{$endereco->cidade->nome}}, {{$endereco->cidade->estado}}</option>

                    @foreach($cidades as $cidade)
                        <option value="{{$cidade->id}}">{{$cidade->nome}}, {{$cidade->estado}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="cidadeAjax" id="cidadeAjax">
                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="/endereco"><button class="btn btn-outline-light text-dark mt-2"><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

@endsection