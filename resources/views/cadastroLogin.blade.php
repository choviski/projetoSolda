
@extends('../../layouts/padraonovo')

@section('content')
    <style>
        #nav_soldadores{
            text-decoration: none;
            font-weight: bold;
        }
        #nav_eps{
            text-decoration: none;
            font-weight: bold;
        }
        #nav_perfil{
            text-decoration: underline;
            font-weight: normal;
        }
        #nav_cadastro{
            text-decoration: underline;
            font-weight: normal;
        }
    </style>
    <div class="col-12 bg-white text-center shadow-sm rounded-bottom">
        <hr class="p-0 m-0 mb-1">
        <p class="lead p-1 m-0" style="font-size: 22px">CADASTRO DE LOGIN:</p>
        @if(!empty($erro))
            <div class="alert alert-danger mt-2">
                {{$erro}}
            </div>
        @endif
    </div>

    <div class="container-fluid col-12 d-flex justify-content-center mt-2 ad-margin">
        <form  class=" col-md-8 col-sm-10 mt-2" action="{{route('novoUsuario')}}" method="post">
      
            @csrf
            <div class="form-group bg-light p-2 rounded">
                @if($usuario->tipo == 1)
                    <label for="empresa" class="mb-0">Empresa:</label>
                    <select class="form-select mb-2" id="idEmpresa" value="idEmpresa" name="empresa" required>
                        <option selected>Selecione uma empresa</option>
                        @foreach($empresas as $empresa)    
                        <option value="{{$empresa->id}}">{{$empresa->razao_social}}</option>
                        @endforeach
                    </select> 
                @else
                    <input type="hidden" name="empresa" id="idEmpresa" value="{{$usuario->empresa->id}}">
                @endif
            
                <label for="email" class="mb-0">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" required>

                <label for="senha" class="mb-0 mt-2">Senha:</label>
                <input type="text" class="form-control" id="email" placeholder="Insira a senha" name="senha" required>
                
                <label for="tipo" class="mb-0 mt-2">Tipo do login:</label>
                <select class="form-select" id="tipo" value="tipo" name="tipo" required>                        
                    <option selected value="3">Consulta</option>    
                    <option value="2">Master</option>                    
                </select> 
                

                <input type="submit" class="btn btn-outline-primary mt-3 col-12">
            </div>
            @if($usuario->tipo == 1)
                <a href="{{route("listagemLogin")}}" class="btn btn-outline-light mt-1 mb-2 col-12 text-dark "><i class="fas fa-arrow-left"></i> Voltar</a>
            @else
                <a href="{{route("editarUsuario")}}" class="btn btn-outline-light mt-1 mb-2 col-12 text-dark "><i class="fas fa-arrow-left"></i> Voltar</a>
            @endif
        </form>
    </div> 
    
@endsection
