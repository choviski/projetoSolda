@extends('../../layouts/padraonovo')

@section('content')
<script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
<style>
    .barra-progresso{
        background-color: white;
        width: 100%;
        height:15px;
        border-radius: 10px;        
        z-index: -2;
    }
    #barra-progresso-atual{
        position: relative;
        display: block;
        background-color: #007bff;
        width: 0%;
        height:15px;
        border-radius: 10px;
        z-index: -1;
        animation: ease;
        transition-timing-function: ease;
    }
    .checkpoint{
        position: absolute;
        height: 50px;
        width: 50px;
        background-color: white;
        border-radius:100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }    
    .legenda{
        position: absolute;
        top:50px;
    }
    .eps{
        left: 0%;
    }
    .processo{        
        right: 66%; 
        transform: translateX(50%);
    }
    .tecnico{        
        right: 33%; 
        transform: translateX(50%);
    }
    .notas{         
        right: 0%;
    }
    .ativo{
        background-color: #007bff;
        color:white;
    }
    #progresso{
        height: 100px;
        display: flex;
        flex-direction: row;
        position:relative;
        align-items: center        
    }
    .sub-form{
        display: none;
    }
    #form-1{
        display: block;
    }  
</style>

<div class="col-12 bg-white text-center shadow-sm rounded-bottom">
    <hr class="p-0 m-0 mb-1">
    <p class="lead p-1 m-0" style="font-size: 22px">Cadastro de EPS:</p>
</div>

<div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-12 p-0 rounded-bottom ">
    <div class="container-fluid col-12 d-flex justify-content-center flex-column mt-2 ad-margin ">
        <div id="progresso">
            <div class="checkpoint eps ativo" id="check-form-1" onclick="mostraForm(1)">
                <i class="fas fa-file-invoice fa-2x"></i>
                <span class="legenda">EPS</span>
            </div>
            <div class="checkpoint processo" id="check-form-2" onclick="mostraForm(2)">
                <i class="fas fa-burn fa-2x"></i>
                <span class="legenda">Processos</span>
            </div>
            <div class="checkpoint tecnico" id="check-form-3" onclick="mostraForm(3)">
                <i class="fas fa-id-card fa-2x"></i>
                <span class="legenda">Técnica</span>
            </div>
            <div class="checkpoint notas" id="check-form-4" onclick="mostraForm(4)">
                <i class="far fa-clipboard fa-2x"></i>
                <span class="legenda">Notas</span>
            </div>
            <div class="barra-progresso">
                <span id="barra-progresso-atual"></span>
            </div>            
        </div>

        <div id="form-1" class="sub-form" name="form-eps">            
            <form  class="col-md-12 col-sm-12 mt-2"  enctype="multipart/form-data" id="form-eps">
                @csrf
                <div class="form-group bg-light p-2 rounded">
                    <h4 class="text-center">EPS <i class="ml-2 fas fa-file-invoice"></i></h4>
                    <hr class="mt-0">

                    <div class="form-row">
                    @if($usuario->tipo==1)
                        <div class="form-col col-12">
                            <label for="id_empresa" class="mb-0 mt-1">Empresa:</label>
                            <select class="form-select" id="id_empresa" name="id_empresa">
                                <option value="" selected>Infosolda (Administrativo)</option>
                                @foreach ($empresas as $empresa)
                                    <option value={{$empresa->id}}">{{$empresa->nome_fantasia}} </option>
                                @endforeach
                            </select>                     
                        </div>
                    @else
                        <input type="hidden" value="{{$usuario->empresa->id}}" name="id_empresa">
                    @endif
                    </div>

                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="nome" class="mb-0 mt-1">Nome:</label>
                            <input type="text" class="form-control" id="nome" placeholder="Nome da EPS" name="nome">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="data" class="mb-0 mt-1" >Data:</label>
                            <input type="date" class="form-control" id="data" placeholder="Data da EPS" name="data">                     
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="norma" class="mb-0 mt-1">Norma:</label>
                            <input type="text" class="form-control" id="norma" placeholder="Norma da EPS" name="norma">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="rqp" class="mb-0 mt-1">RQP:</label>
                            <input type="text" class="form-control" id="rqp" placeholder="RQP" name="rqp">                     
                        </div>
                    </div>
                    <button class="btn btn-outline-primary mt-3 col-12" onclick="mostraForm(2)">
                        Continuar
                    </button>
                </div>
            </div>

            <div id="form-2" name="form-processos" class="sub-form">           
               
                <div class="form-group bg-light p-2 rounded">
                    <h4 class="text-center">Processos <i class="ml-2 fas fa-burn"></i></h4>
                    <hr class="mt-0">
                    
                    <button id="adicionar-processos" class="btn btn-primary btn-block font-weight-light" data-toggle="modal" data-target="#processoModal">
                        <i class="fa fa-plus"></i>
                        <span>Adicionar Processo</span>
                    </button>            

                    <div id="lista_processos">                      
                    </div>
                   
                    <button class="btn btn-outline-primary mt-3 col-12" onclick="mostraForm('3')">
                        Continuar
                    </button>
                    <button class="btn btn-outline-danger mt-1 col-12" onclick="mostraForm('1')">
                        Voltar
                    </button>
                </div>
            </div>
            <div id="form-3" name="form-tecnico" class="sub-form">            
               
                <div class="form-group bg-light p-2 rounded">
                    <h4 class="text-center">Técnica <i class="ml-2 fas fa-id-card"></i></h4>
                    <hr class="mt-0">  
                    
                    <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
                    <input type="text" class="form-control" id="artigo" placeholder="Artigo da Ficha Técnica" name="artigo">    
             

                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="goivagem" class="mb-0 mt-1">Goivagem:</label>
                            <input type="text" class="form-control mb-1" id="goivagem" placeholder="Goivagem" name="goivagem">                   
                        </div>
                        <div class="form-col col-6"> 
                            <label for="martelamento" class="mb-0 mt-1">Martelamento:</label>
                            <input type="text" class="form-control mb-1" id="martelamento" placeholder="Martelamento" name="martelamento">                    
                        </div>
                    </div>
                  
                  
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="cordoes" class="mb-0 mt-1">Cordões:</label>
                            <input type="text" class="form-control mb-1" id="cordoes" placeholder="Cordões" name="cordoes">                   
                        </div>
                        <div class="form-col col-6">   
                            <label for="eletrodo" class="mb-0 mt-1">Eletrodo:</label>
                            <input type="text" class="form-control mb-1" id="eletrodo" placeholder="Eletrodo" name="eletrodo">   
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="espacamento_eletrodo" class="mb-0 mt-1">Espaçamento entre eletrodos:</label>
                            <input type="text" class="form-control mb-1" id="espacamento_eletrodo" placeholder="Espaçamento entre eletrodos:" name="espacamento_eletrodo">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="unidade_medida_espacamento" class="mb-0 mt-1" >Unidade de medida do espaçamento:</label>
                            <input type="text" class="form-control mb-1" id="unidade_medida_espacamento" placeholder="Unidade de medida do espaçamento" name="unidade_medida_espacamento">                     
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="diametro_bocal" class="mb-0 mt-1">Diâmetro do bocal:</label>
                            <input type="number" step="0.01" class="form-control mb-1" id="diametro_bocal" placeholder="Diâmetro do bocal:" name="diametro_bocal">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="unidade_medida_bocal" class="mb-0 mt-1" >Unidade de medida do bocal:</label>
                            <input type="text" class="form-control mb-1" id="unidade_medida_bocal" placeholder="Unidade de medida do bocal" name="unidade_medida_bocal">                     
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="oscilacao" class="mb-0 mt-1">Oscilação:</label>
                            <select class="form-select" id="oscilacao" name="oscilacao">
                                <option selected disabled>Escolha a forma de oscilação</option>
                                <option value="retilinea">Retilinea</option>
                                <option value="oscilante">Oscilante</option>
                            </select> 
                        </div>
                        <div class="form-col col-6">
                            <label for="passes_simples_multiplos" class="mb-0 mt-1">Passes simples ou múltiplos:</label>
                            <select class="form-select" id="passes_simples_multiplos" name="passes_simples_multiplos">
                                <option value="simples" selected>Simples</option>
                                <option value="multplos">Múltiplos</option>
                            </select> 
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="processo_termico" class="mb-0 mt-1">Processo térmico de preparação:</label>
                            <select class="form-select" id="processo_termico" name="processo_termico">
                                <option value="sim" selected>Sim</option>
                                <option value="nao">Não</option>
                            </select> 
                        </div>
                        <div class="form-col col-6">
                            <label for="inspecao_final" class="mb-0 mt-1">Inspeção final:</label>
                            <input type="text" class="form-control mb-1" id="inspecao_final" placeholder="Inspeção final" name="inspecao_final">                     
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="limpeza" class="mb-0 mt-1">Limpeza:</label>
                            <input type="text" class="form-control mb-1" id="limpeza" placeholder="Limpeza" name="limpeza">                   
                        </div>
                        <div class="form-col col-6">
                            <label for="tipo_passe" class="mb-0 mt-1">Tipo de passe:</label>
                            <input type="text" class="form-control mb-1" id="tipo_passe" placeholder="Tipo de passe" name="tipo_passe">   
                        </div>
                    </div>
                  
                    <button class="btn btn-outline-primary mt-3 col-12" onclick="mostraForm('4')">
                        Continuar
                    </button>
                    <button class="btn btn-outline-danger mt-1 col-12" onclick="mostraForm('2')">
                        Voltar
                    </button>
                </div>
           
            </div>       

            <div id="form-4" name="form-notas" class="sub-form">            
               
                <div class="form-group bg-light p-2 rounded">
                    <h4 class="text-center">Notas <i class="ml-2 fas fa-clipboard "></i></h4>
                    <hr class="mt-0">
                    <label for="#">Notas:</label>
                    <br>
                    <textarea name="notas" id="notas" class="col-12" style="resize: none;"></textarea>
                    <button class="btn btn-outline-primary mt-3 col-12" onclick="terminarCadastro()">Terminar cadastro</button>
                    <button class="btn btn-outline-danger mt-1 col-12" onclick="mostraForm('3')">
                        Voltar
                    </button>
                </div>
            </div>   
        </form>
        
        @include('epsAvancada.processo.modalProcesso')

        <div class="col-md-12 col-sm-12">
            <a href="{{route("paginaInicial")}}" class="btn btn-outline-light mt-1 mb-2 col-12 text-dark "><i class="fas fa-arrow-left"></i> Retornar à página principal</a>
        </div>           
    </div>
</div>

<script>

    function mostraForm(nForm) {
        event.preventDefault();    
        $('#form-1').css('display', 'none');
        $('#form-2').css('display', 'none');
        $('#form-3').css('display', 'none');
        $('#form-4').css('display', 'none');
        $('#form-'+nForm).css('display', 'block');
        barraProgresso(nForm);
    };

    function barraProgresso(nForm){
        for (var i = 0; i <= 4; i++) {
            $('#check-form-' + i).removeClass('ativo');
        }
        for (var i = 0; i <= nForm; i++) {
            $('#check-form-' + i).addClass('ativo');
        }
        progresso=(100/3)*(nForm-1);
        $("#barra-progresso-atual").css('width',progresso+'%')
    }

    $("#adicionar-processos").click(function(event){
        event.preventDefault();
    });

    function terminarCadastro(){
        event.preventDefault();
        var formData = $("#form-eps").serialize();
        var processoIds = [];
        $('input[name="processo_id[]"]').each(function() {
            processoIds.push($(this).val());
        });
        // Combina os dados do campo processo_id[] com a serialização do formulário
        formData += '&processo_ids=' + processoIds.join(',');

        var linkAjax = '{{route("armazenarEpsAvancada")}}';
        $.ajax({
            url: linkAjax, 
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                alert("EPS cadastrada com sucesso!");
                window.location.href = '{{route("listarEpsAvancada")}}';
                // Feedback para o usuário dizendo que a EPS desse foi cadastrada
                // Redireciona pra listagem de EPS e um abraço pro gaitero
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("ERRO! Verifique se todos os campos estão preenchidos corretamente");
            }
        });
    }
  
   
</script>

@endsection