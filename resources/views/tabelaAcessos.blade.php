<div class="row col-12 d-flex justify-content-center m-0 p-0 " id="tabelaAppend">

    <div class="col-12">
        <div class="table table-sm table-responsive" id="tabelaAcessos">
            <table class="table table-bordered rounded bg-white mt-2 col-12 ">

                <thead class="rounded">
                <tr>
                    <th colspan="12" id="tableTitle">Acessos</th>
                </tr>
                <tr>
                    <th scope="col" colspan="6">Usuario</th>
                    <th scope="col" colspan="6">Horario do Acesso</th>                 
                </tr>
                </thead>
                <tbody>
                @foreach($acessos as $acesso)
                    <tr>
                        <td colspan="6">{{$acesso->usuario->nome}}</td>
                        <td colspan="6">{{$acesso->created_at}}</td>                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
