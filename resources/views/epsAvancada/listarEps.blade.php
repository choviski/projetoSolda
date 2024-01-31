@extends('../../layouts/padraonovo')

@section('content')


<div class="col-12 bg-white text-center shadow-sm rounded-bottom">
    <hr class="p-0 m-0 mb-1">
    <p class="lead p-1 m-0" style="font-size: 22px">EPS Avançadas:</p>
</div>

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
        <div class="bg-light rounded mt-3 p-2">
            <div class="col-12 d-flex justify-content-between">
                <span class="btn btn-secondary disabled" disabled >Nome: {{$eps->nome}}</span>
                <span class="btn btn-secondary" style="cursor: pointer" >Gerar Documento</span>
            </div>            
            <hr class="m-1">
            <div class="col-12 d-flex flex-column">
                <span class="d-block">Processos</span>
                @foreach($eps->processos as $processo)                
                    <span> - 
                        <span class="badge badge-secondary w-fit">{{$processo->nome}}</span>
                    </span>
                @endforeach
            </div>
        </div>
    @endforeach


    <div class="mt-2" style="display">
        {{$epsAvancadas->links()}}
    </div>

</div>



@endsection