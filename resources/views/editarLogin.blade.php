
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
        <p class="lead p-1 m-0" style="font-size: 22px">EDIÇÃO DE LOGIN:</p>
        @if(!empty($erro))
            <div class="alert alert-danger mt-2">
                {{$erro}}
            </div>
        @endif
    </div>

    <div class="container-fluid col-12 d-flex justify-content-center mt-2 ">
        <form  class=" col-md-9 col-sm-10 mt-2" action="{{Route('salvarLogin',['id'=> $login->id,'id_empresa'=>$login->id_empresa])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group bg-light p-2 rounded">
                <label for="empresa" class="mb-0">Empresa:</label>
                <select class="form-select mb-2" id="idEmpresa" value="idEmpresa" name="empresa" disabled required>
                    <option selected value="{{$login->empresa->id}}">{{$login->empresa->razao_social}}</option>
                </select> 
            
                <label for="email" class="mb-0">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Insira o email" name="email" value="{{$login->email}}" required>

                <label for="senha" class="mb-0 mt-2">Senha:</label>
                <input type="text" class="form-control" id="email" placeholder="Insira a senha" name="senha" value="{{$login->senha}}" required>
                
                <label for="tipo" class="mb-0 mt-2">Tipo do login:</label>
                <select class="form-select" id="tipo" value="tipo" name="tipo" required>                        
                    <option value="3" {{$login->tipo==3 ? 'selected':''}}>Consulta</option>    
                    <option value="2" {{$login->tipo==2 ? 'selected':''}}>Master</option>                    
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
