
@extends('../../layouts/padraonovo')

@section('content')
    <script>
        function formataTelefone(){
            var telefone = document.getElementById("telefone").value;
            var telefoneFormatado = telefone.replace(/^(\d{2})(\d{4})(\d{4}).*/, '($1) $2-$3');
            document.getElementById("telefone").value=(telefoneFormatado);
        }
        function formataCelular(){
            var celular = document.getElementById("celular").value;
            var celularFormatado = celular.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
            document.getElementById("celular").value=(celularFormatado);
        }
        function formataCNPJ(){
            var cnpj = document.getElementById("cnpj").value;
            var cnpjFormatado = cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2}).*/, '$1.$2.$3/$4-$5');
            document.getElementById("cnpj").value=(cnpjFormatado);
        }
    </script>
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
        <p class="lead">Gerenciar Empresas:</p>
    </div>

    <div class="row col-12 d-flex justify-content-center mt-2 ">
        <form  class="col-12 mt-2" action="{{Route('salvarEmpresa')}}" method="post">
            @csrf
            <div class="form-group bg-light p-2 rounded">
                <label  for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" id="cnpj" placeholder="Insira CNPJ da empresa" name="cnpj" onchange="formataCNPJ()" maxlength="14" required>

                <label  for="razao_social">Razão Social:</label>
                <input type="text" class="form-control" id="razao_social" placeholder="Insira a razão social da empresa" name="razao_social" required>

                <label  for="nome_fantasia">Nome Fantasia</label>
                <input type="text" class="form-control" id="nome_fantasia" placeholder="Insira o nome fantasia da empresa (se tiver)" name="nome_fantasia">

                <label  for="celular">Celular:</label>
                <input type="tel" class="form-control" id="celular" placeholder="insira o celular da empresa (apenas numeros)" name="celular" onchange="formataCelular()" maxlength="11">

                <label  for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" placeholder="insira o telefone da empresa (apenas numeros)" name="telefone" onchange="formataTelefone()" required maxlength="10">

                <label  for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="insira o email da empresa" name="email" required>

                <label  for="senha">Senha (sugestão):</label>
                <input type="text" class="form-control" id="senha" value="{{$senha}}" name="senha" required>

                <input type="hidden" value="1" name="id_usuario" required>


                <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
                    <hr>
                    <p class="lead">Endereço:</p>
                </div>
                <div class="form-group bg-light p-2 rounded">
                    <label  for="cep">CEP:</label>
                    <input type="text"  size="10" maxlength="9" class="form-control" id="cep" placeholder="Insira o CEP" name="cep" required>

                    <label  for="rua">Rua:</label>
                    <input type="text" class="form-control" id="rua" placeholder="Insira a rua" name="rua" required>

                    <label  for="bairro">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" placeholder="Insira o bairro" name="bairro" required>

                    <label  for="numero">Número:</label>
                    <input type="number" class="form-control" id="numero" placeholder="Insira o número" name="numero" required>

                    <label  for="complemento">Complemento:</label>
                    <input type="text" class="form-control" id="complemento" placeholder="Insira o complemento" name="complemento" required>

                    <label for="id_cidade">Cidade:</label>
                    <select class="form-control" id="id_cidade" name="id_cidade" required>
                        <option id="op1" value="-1" selected>Selecione a cidade</option>

                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->id}}">{{$cidade->nome}}, {{$cidade->estado}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="cidadeAjax" id="cidadeAjax">
                </div>
                @if(!empty($sem_inspetor))
                    <div class="alert alert-success mt-2">
                        {{$sem_inspetor}}
                    </div>
                @endif
                <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
                    <hr>
                    <p class="lead">Inspetor:</p>
                </div>
                <select class="form-control" id="id_inspetor" name="id_inspetor" required>
                    <option value="1">Selecione o Inspetor</option>

                    @foreach($inspetors as $inspetor)
                        @if($inspetor->id!=1)
                        <option value="{{$inspetor->id}}">{{$inspetor->nome}}, {{$inspetor->crea}}</option>
                        @endif
                    @endforeach
                </select>
                <section id="faq" class="col-12  text-dark mt-2">
                    <div class="container p-0 m-0 col-12">
                        <div class="row">
                            <button class="btn btn-outline-primary shadow text-dark col-sm-12 col-md-12 d-flex justify-content-left "
                                    type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="false"
                                    aria-controls="faq1">
                                <a class="ml-2">Novo Inspetor <i class="fas fa-hard-hat"></i> <i
                                            class="mt-1 mr-2 fas fa-plus  fa-1x "> </i></a>
                            </button>
                            <div class="collapse rounded col-12" id="faq1">
                                <div class="card card-body  col-sm-12 col-md-12 rounded">
                                    <div class="form-group bg-light p-2 rounded bg-success">
                                        <label  for="nome">Nome:</label>
                                        <input type="text" class="form-control" id="nome" placeholder="Insira o nome do inspetor" name="nome" >

                                        <label  for="crea">CREA:</label>
                                        <input type="text" class="form-control" id="crea" placeholder="insira o CREA do inspetor" name="crea" >

                                        <label  for="funcao">Função:</label>
                                        <input type="text" class="form-control" id="funcao" placeholder="insira a função do inspetor" name="funcao" >


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
        </form>
        <a href="{{route("cadastrar")}}"><button class="btn btn-outline-light mt-2 text-dark "><i class="fas fa-arrow-left"></i> Voltar</button></a>
    </div>

    <script>
        $(document).ready(function(){
            $('#telefone').mask('(99) 9999-9999');
        });
        $(document).ready(function(){
            $('#cnpj').mask('99.999.999/9999-99');
        });
    </script>
@endsection
