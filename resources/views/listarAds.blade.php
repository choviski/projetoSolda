@extends('../../layouts/padraonovo')

@section('content')
    <style>
        .nomeAd{
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
            text-decoration: underline;
            font-weight: normal;
        }
        #nav_eps{
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
            top:-25px;
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
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">ANÚNCIOS:</p>
    </div>
    
    <div class="container-fluid d-flex justify-content-center flex-column col-md-7 col-sm-10 p-0 rounded-bottom ">
        <div id="addAd" class="col-12 mt-2 p-0 popin">            
            <form method="get" action="{{route("cadastrarAd")}}">
                @csrf
                <input type="submit" class="btn btn-primary btn-block font-weight-light" value="Cadastrar anúncio novo">
            </form>
        </div>       
  
        <div id="anuncios">
            @include('cardAd') 
        </div>
        <!-- div class="ad-margin">
            { {$ads->links()}}
        </div -->
    </div>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"
    >
    </script>

@endsection