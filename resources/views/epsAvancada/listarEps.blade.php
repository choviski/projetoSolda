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

    <!-- Listagem de Eps Avançadas  -->

</div>

@endsection