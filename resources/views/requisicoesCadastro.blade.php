@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .styleNomeQualificacao{
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }
        .nomeEmpresa{
            position: relative;
            top:34px;
            left: -15px;
            margin-bottom: 0px;
            background-color: white;
            width:auto;
            display:inline-block;
            padding: 0 0.5vw 0 0.5vw;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            text-decoration: underline;
            text-align: center;
        }
        #nav_requalificacao{
            text-decoration: none;
            font-weight: bold;
        }
        #nav_requisicoes{
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
        <p class="lead p-1 m-0" style="font-size: 22px">REQUISIÇÕES:</p>
    </div>
    @foreach($soldadores as $soldador)
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12">
            <div id="dadosRequalificacoes">
                <div class="popin">
                    <p class="nomeEmpresa" style="z-index: 1">{{$soldador->empresa->razao_social}}</p>
                    <div class="row d-flex justify-content-between p-2 bg-white rounded shadow-sm form-inline " style="margin-top: 30px ">
                        <div class="">
                            <div>
                                <img src="@if($soldador->foto){{asset($soldador->foto)}} @else{{asset("imagens/soldador_default.png")}}@endif" onerror="this.onerror=null;this.src='{{asset("imagens/soldador_default.png")}}';" width="100px" height="100px" class="rounded-circle border">
                            </div>
                            <p class="styleNomeQualificacao mb-md-0 mb-sm-1 mt-2"> {{$soldador->nome}}</p>
                        </div>
                        <div>
                            <form method="post" action="{{route("avaliarRequisicao")}}" class="form-group">
                                @csrf
                                <input type="hidden" value="{{$soldador->id}}" name="id">
                                <input type="submit" class="ml-md-1 btn btn-primary pt-2 pb-2 pl-3 ml-sm-0 pr-3 shadow-sm" value="Avaliar Cadastro">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    @endforeach
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>

@endsection