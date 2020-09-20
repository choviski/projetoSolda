

@extends(".layouts.iniciais")


@section('content')

    <div class=" p-2 bg-light rounded shadow text-center">
        <form action="{{route("cadastrar")}}" method="post" class="form-group ">
            @csrf
            @if(!empty($erro))
                <div class="alert alert-danger mt-2">
                    {{$erro}}
                </div>
            @endif
            @if(!empty($erro2))
                <div class="alert alert-danger mt-2">
                    {{$erro2}}
                </div>
            @endif

            <input type="text" name="nome" class="form-control mt-2" placeholder="Nome" required>
            <input type="email" name="email" class="form-control mt-2" placeholder="E-mail" required>
            <input type="password" name="senha" class="form-control mt-2" placeholder="Senha" required>

            <input type="submit" value="Cadastrar" class="btn-block btn-primary rounded mt-2">

        </form>
        <a href="/">Voltar</a>

    </div>
@endsection
