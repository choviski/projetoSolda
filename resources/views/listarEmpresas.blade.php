@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .nomeEmpresa{
            text-align: center;
            padding: 0.5rem 0.8rem;
            border-radius: 0.5rem;
            font-size: 18px;
            background-color: #eeeeee;
        }
        #nav_empresas{
            text-decoration: underline;
            font-weight: bold;
        }
        #nav_entidades{
            text-decoration: none;
            font-weight: normal;
        }
        .formDelBtn{
            position: relative;
            transition: 0.3s ease;
        }
        .delBtn{
            padding: 0px;
            margin: 0px;
            position: absolute;
            font-size: 1.0rem;
            width: 25px;
            height: 25px;
            top:-17px;
            right: 13px;
            z-index: 1;
            background-color: white;
            color: #d92b2b;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+25%);
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
            top:-17px;
            right: 43px;
            z-index: 1;
            background-color: white;
            color: #228db8;
            font-weight: lighter;
            border-radius: 5px;
            transform: translateY(+25%);
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
        <p class="lead p-1 m-0" style="font-size: 22px">EMPRESAS:</p>
    </div>
    <div class="container-fluid d-flex justify-content-center flex-column col-md-9 col-sm-10 p-0 rounded-bottom ">
        @if($usuario->tipo==1)
            <div id="addEmpresa" class="col-12 mt-2 p-0 popin">
                <form method="get" action="{{route("inserirEmpresa")}}">
                    @csrf
                    <input type="hidden" name="idSoldador" id="idSoldador">
                    <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Adicionar empresa">
                </form>
            </div>
    @endif

            <div id="dadosempresa">
                @include('cardEmpresas')
            </div>
            <div class="ajax-load text-center mt-2" style="display: none">
                <p><img src="{{asset("imagens/loading.gif")}}" height="50px"/>Carregando empresas</p>
            </div>
    <!-- Aqui acaba a listagem das empresas-->
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>
    <script>
        var linkAjax = '{{route("paginaInicial",":pagina")}}'
        function carregarMaisDados(pagina){
            linkAjax = linkAjax.replace(':pagina',"page="+pagina);
            $.ajax({
                url:'?page='+pagina,
                type:'get',
                beforeSend:function (){
                    $(".ajax-load").show();
                }
            })
                .done(function (data){
                    if(data.html == ""){
                        $('.ajax-load').html("");
                        return;
                    }
                    $('.ajax-load').hide();
                    $('#dadosempresa').append(data.html);
                })
                .fail(function(jqHXR,ajaxOptions,thrownError){
                    alert("O servidor não esta respondendo")
                })
        }
        var pagina=1;
        $(window).scroll(function (){
            if($(window).scrollTop() + $(window).height()>= $(document).height()){
                pagina++;
                carregarMaisDados(pagina);
            }
        });

    </script>
@endsection