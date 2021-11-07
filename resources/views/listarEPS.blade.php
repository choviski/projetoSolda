@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .nomeEps{
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }
        #nav_soldadores{
            text-decoration: none;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
        #nav_eps{
            text-decoration: underline;
            font-weight: normal;
        }
        .formDelBtn{
            position: relative;
            transition: 0.3s ease;
        }
        .nomeEmpresa{
            position: relative;
            top:22px;
            left: 15px;
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
        .delBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:-10px;
            right: 13px;
            z-index: 1;
            background-color: white;
            color: #d92b2b;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+50%);
            align-items: center;
            text-align: center;
            transition: 0.3s ease;
            border-style: solid;
            border-width: 1px;
            border-color: #d92b2b;
        }
        .delBtn:hover{
            background-color: #d92b2b;
            color: white;
        }
        .delBtn:hover{
            background-color: #d92b2b;
        }
        .formEditBtn{
            position: relative;
        }
        .editBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:-10px;
            right: 43px;
            z-index: 1;
            background-color: white;
            color: #228db8;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+50%);
            align-items: center;
            text-align: center;
            border-style: solid;
            border-width: 1px;
            border-color: #0c7eab;
            transition: 0.3s ease;
        }
        .editBtn:hover{
            background-color: #0c7eab;
            color: white;
            align-items: center;
            text-align: center;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">EPS:</p>
    </div>

    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 p-0 rounded-bottom ">
    @if($usuario->tipo==1)
            <div id="addEps" class="col-12 mt-2 p-0 popin">
               
                <form method="get" action="{{route("inserirEps")}}">
                    @csrf
                    <input type="hidden" name="idEmpresa" id="idEmpresa">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar EPS">
                </form>
            </div>
        @endif
        @if($usuario->tipo==2)
            <div id="addEps" class="col-12 mt-2 p-0 popin">
                <form method="get" action="{{route("requisitarEps")}}">
                    @csrf
                    <input type="hidden" name="idEmpresa" id="idEmpresa" value="{{\App\Empresa::where('id_usuario','=',$usuario->id)->pluck("id")[0]}}">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Requisitar cadastro de nova EPS">
                </form>
            </div>
        @endif
  
        <div id="dadoseps">
            @include('cardEps')
        </div>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>

@endsection