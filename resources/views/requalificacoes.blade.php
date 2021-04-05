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
        <p class="lead p-1 m-0" style="font-size: 22px">REQUALIFICAÇÕES:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-8 col-12">
            <div id="dadosRequalificacoes">
                @include('cardRequalificacoes')
            </div>
            <div class="ajax-load text-center mt-2" style="display: none">
                <p><img src="{{asset("imagens/loading.gif")}}" height="50px"/>Carregando requalificações>
            </div>


        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>

@endsection