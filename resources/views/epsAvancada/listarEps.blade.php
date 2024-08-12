@extends('../../layouts/padraonovo')

@section('content')

<style>
        #nav_eps_avancada {
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades {
            text-decoration: none;
        }
        .filteredBy{
            background: #5398ff;
            color:white;
            border-radius: 5px;
            padding: 2px 12px;
        }
        .removeFilter{
            background: #ff6464;
            color:white;
            border-radius: 5px;
            padding: 2px 6px 2px 12px;
            cursor: pointer;
        }
        .removeFilterBtn{
            cursor: pointer;
            background: white;
            color:#ff6464;
            border-radius: 100%;
            width: 15px;
            height: 15px;
            position: relative;
        }
</style>

<div class="col-12 bg-white text-center shadow-sm rounded-bottom">
    <hr class="p-0 m-0 mb-1">
    <p class="lead p-1 m-0" style="font-size: 22px">EPS Avançadas:</p>
    <div class="d-flex justify-content-center pr-2" style="position: absolute;top:5px; right:0px;">
        <button type="button" class="btn btn-outline-primary mb-0 mr-sm-0 mr-md-1" role="button" style="width:50px"
        data-toggle="modal" data-target="#filtroModal">
            <i class="fas fa-filter" ></i>
        </button>
    </div>
</div>

<!-- Modal Form de filtro -->
<div class="modal fade" id="filtroModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered col-10" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-filter text-primary"></i> Filtrar EPS  </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="get" action="{{route("listarEpsAvancada")}}" id="formFiltro">
            <div class="modal-body">
                @csrf

                <label for="processos-qual_processo" class="form-label mb-1 mt-1">Processo da EPS: </label>                   
                <select name="processos-qual_processo" id="processos-qual_processo" class="form-select">
                    <option value="" selected>Selecione o tipo de processo da EPS</option>
                    @if(isset($filtros["processos-qual_processo"]))
                        <option selected value="{{$filtros["processos-qual_processo"][1]}}">{{$filtros["processos-qual_processo"][1]}}</option> 
                    @endif
                    <option value="" >Qualquer um</option>
                    <option value="TIG">TIG</option>
                    <option value="GMAW">GMAW</option>
                    <option value="FCAW">FCAW</option>
                </select> 
                
                <label for="norma" class="form-label mb-1 mt-1">Norma da EPS: </label>                   
                <input  type="text" name="norma" id="norma" class="form-control"
                value="{{ isset($filtros["norma"][1]) ? $filtros["norma"][1] : '' }}">                      

                <label for="processos-juntas-tipo_junta" class="form-label mb-1">Chanfro de junta: </label>                   
                <select name="processos-juntas-tipo_junta" id="processos-juntas-tipo_junta" class="form-select">
                    <option value="" selected>Selecione o chanfro de Junta</option>
                    @if(isset($filtros["processos-juntas-tipo_junta"]))
                        <option selected value="{{$filtros["processos-juntas-tipo_junta"][1]}}">{{$filtros["processos-juntas-tipo_junta"][1]}}</option> 
                    @endif
                    <option value="" >Qualquer uma</option>
                    <option value="Chanfro em J">Chanfro em J</option>
                    <option value="Chanfro em K">Chanfro em K</option>
                    <option value="Chanfro em U">Chanfro em U</option>
                    <option value="Chanfro em V">Chanfro em V</option>
                    <option value="Chanfro em X">Chanfro em X</option>
                    <option value="Chanfro em meio V">Chanfro em meio V</option>
                    <option value="Chanfro em duplo J">Chanfro em duplo J</option>
                    <option value="Chanfro em duplo U">Chanfro em duplo U</option>
                </select>                  
            
                <label for="processos-juntas-cota_t" class="form-label mb-1 mt-1">Cota T (Junta): </label>                   
                <input type="text" name="processos-juntas-cota_t" id="processos-juntas-cota_t" class="form-control"
                value="{{ isset($filtros["processos-juntas-cota_t"][1]) ? $filtros["processos-juntas-cota_t"][1] : '' }}">                    
            
                <label for="processos-materiaisBases-tipo_grau" class="form-label mb-1 mt-1">Especificação tipo/grau (Metal base): </label>                   
                <input type="text" name="processos-materiaisBases-tipo_grau" id="processos-materiaisBases-tipo_grau" class="form-control"
                value="{{ isset($filtros["processos-materiaisBases-tipo_grau"][1]) ? $filtros["processos-materiaisBases-tipo_grau"][1] : '' }}">

                <label for="processos-metaisAdicao-forma_consumivel" class="form-label mb-1 mt-1">Forma do consumível (Metal de adição): </label>                   
                <input type="text" name="processos-metaisAdicao-forma_consumivel" id="processos-metaisAdicao-forma_consumivel" class="form-control"
                value="{{ isset($filtros["processos-metaisAdicao-forma_consumivel"][1]) ? $filtros["processos-metaisAdicao-forma_consumivel"][1] : '' }}">


                <label for="processos-metaisAdicao-classificacao_aws" class="form-label mb-1">Classificação AWS (Metal de adição): </label>                   
                <select name="processos-metaisAdicao-classificacao_aws" id="processos-metaisAdicao-classificacao_aws" class="form-select">
                    <option value="" selected>Selecione a classificação AWS/S.F.A</option>
                    @if(isset($filtros["processos-metaisAdicao-classificacao_aws"]))
                        <option selected value="{{$filtros["processos-metaisAdicao-classificacao_aws"][1]}}">{{$filtros["processos-metaisAdicao-classificacao_aws"][1]}}</option> 
                    @endif
                    <option value="">Qualquer uma</option>
                    <option value="A5.1">A5.1</option>
                    <option value="A5.2">A5.2</option>
                    <option value="A5.3">A5.3</option>
                    <option value="A5.4">A5.4</option>
                    <option value="A5.5">A5.5</option>
                    <option value="A5.6">A5.6</option>
                    <option value="A5.7">A5.7</option>
                    <option value="A5.8">A5.8</option>
                    <option value="A5.9">A5.9</option>
                    <option value="A5.10">A5.10</option>
                    <option value="A5.11">A5.11</option>
                    <option value="A5.12">A5.12</option>
                    <option value="A5.13">A5.13</option>
                    <option value="A5.14">A5.14</option>
                    <option value="A5.15">A5.15</option>
                    <option value="A5.16">A5.16</option>
                    <option value="A5.17">A5.17</option>
                    <option value="A5.18">A5.18</option>
                    <option value="A5.19">A5.19</option>
                    <option value="A5.20">A5.20</option>
                    <option value="A5.21">A5.21</option>
                    <option value="A5.22">A5.22</option>
                    <option value="A5.23">A5.23</option>
                    <option value="A5.24">A5.24</option>
                    <option value="A5.25">A5.25</option>
                    <option value="A5.26">A5.26</option>
                    <option value="A5.27">A5.27</option>
                    <option value="A5.28">A5.28</option>
                    <option value="A5.29">A5.29</option>
                    <option value="A5.31">A5.31</option>
                    <option value="A5.32">A5.32</option>
                </select>  
                
                <label for="processos-gas-gas_protecao" class="form-label mb-1 mt-1">Tipo de gás (Gás): </label>                   
                <input  type="text" name="processos-gas-gas_protecao" id="processos-gas-gas_protecao" class="form-control"
                value="{{ isset($filtros["processos-gas-gas_protecao"][1]) ? $filtros["processos-gas-gas_protecao"][1] : '' }}">
                    
                    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Filtrar</button>
                <button type="button" onclick="resetForm()" class="btn btn-secondary">Limpar formulário</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- -->

<!-- Filtros ativos -->
@if(isset($filtros) && count($filtros)>0)
 
  <div class="d-flex flex-wrap">
    <div class="filteredBy shadow mr-2 mt-2">
        <a>Filtros ativos: </a>
    </div>

    @foreach ($filtros as $nomeCampo => $filtro )
    <div class="filteredBy  align-items-center shadow mr-2 mt-2 d-flex">
        <a><b>{{$filtro[0]}}</b>: {{$filtro[1]}}</a>
        <div class="removeFilterBtn ml-1" onclick="(removeFiltroIndividual('{{$nomeCampo}}'))">
            <span style="position: absolute; top:-6px; right:4px" >
                x
            </span>
        </div>
    </div>
      
    @endforeach

    <form method="get" action="{{route("listarEpsAvancada")}}">
        @csrf            
        <button style="background-color: transparent; padding: 0px; border:none; box-size:border-box">
            <div class="mt-2 removeFilter shadow d-flex align-items-center">                    
                <a>Remover todos os filtros                        
                </a>
                <div class="removeFilterBtn ml-1">
                    <span style="position: absolute; top:-6px; right:4px ">x</span>
                </div>
            </div>
        </button>    
    </form>                
</div>
@endif
<!-- -->

<div id="addEps" class="col-12 mt-2 p-0 popin">
    <div class="container-fluid d-flex justify-content-center flex-column col-md-7 col-sm-10 p-0 rounded-bottom ">
        <form method="get" action="{{route("cadastrarEpsAvancada")}}">
            @csrf
            <input type="hidden" name="idEmpresa" id="idEmpresa">
            <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Cadastrar EPS">
        </form>
    </div>
</div>

<div class="container-fluid d-flex justify-content-center flex-column col-md-7 col-sm-10 p-0 rounded-bottom ">
    <!-- Listagem de Eps Avançadas  -->
    @foreach($epsAvancadas as $eps)
        <div class="bg-light rounded mt-3 p-2" id="div-eps-{{$eps->id}}">
            <div class="col-12 d-flex justify-content-between">
                <span class="btn btn-secondary disabled" disabled >Nome: {{$eps->nome}}</span>
                <div>
                    <form method="post" class="d-inline" action="{{('geraEPS')}}" target="_blank" rel="noopener noreferrer">
                        @csrf
                        <input type="hidden" name="id_eps" value="{{$eps->id}}">                    
                        <button class="btn btn-secondary" style="cursor: pointer" >
                            Gerar Documento
                            <i class="pl-2 fas fa-file-alt"></i>
                        </button>
                    </form>
                    <span class="btn btn-outline-danger" style="cursor: pointer" onclick="removeEps({{$eps->id}})" >
                        <i class="fas fa-times"></i>
                    </span>
                </div>            
            </div>            
            <hr class="m-1">
            <div class="col-12 d-flex flex-column">
                <span class="d-block">Processos</span>
                @foreach($eps->processos as $processo)                
                    <span> - 
                        <span class="badge badge-secondary w-fit">{{$processo->qual_processo}}</span>
                    </span>
                @endforeach
            </div>
        </div>
    @endforeach


    <div class="mt-2" style="display">
        {{$epsAvancadas->links()}}
    </div>
</div>

<script>
    function removeEps(id){
        if(confirm("Tem certeza que deseja excluir esta EPS?")){
            var linkAjax = '{{route("deleteEpsAvancada",":id")}}';
            linkAjax = linkAjax.replace(':id',id);
            $.ajax({
                url:linkAjax,
                type:'DELETE',                
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
            })
                .done(function(data){
                    $('#div-eps-'+id).remove();
                })            
                .fail(function(jqHXR,ajaxOptions,thrownError){
                })    
        }
    }

    function resetForm() {
        $('#formFiltro :input').each(function() {
            $(this).val('');
        });
        $('#imagem').val($('#imagem option:first').val());
        $('#classificacao_aws').val($('#classificacao_aws option:first').val());
        $('#qual_processo').val($('#qual_processo option:first').val());
    }

    function removeFiltroIndividual(filtro){
        $('#'+filtro).val('');
        $('#formFiltro').submit();
    }
</script>



@endsection