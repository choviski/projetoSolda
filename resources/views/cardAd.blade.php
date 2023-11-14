<style>
    @media only screen and (max-width: 650px) {
        .adCard {
            flex-direction: column;
        }


    }
</style>
@foreach($anuncios as $anuncio)
    <!-- Aqui começa a listagem dos anuncios-->
    <div class="wrapAdCard popin">

        <div class="formDelBtn">
            <form method="post" action="{{route('deletarAd',['id'=> $anuncio->id])}}"
                  onsubmit="return confirm('Tem certeza que deseja remover esse anúncio?')"> <!--Rota ad.delete-->
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$anuncio->id}}">
                <button class="delBtn"><i class="fas fa-times"></i></button>
            </form>
        </div>
        <div id="adCard" class="col-12 bg-white rounded shadow-sm d-flex justify-content-between mt-3 popin adCard">
            <div id="infoAd" class="p-2 mt-1 d-flex  justify-content-end flex-column">
                <p class="nomeAd mt-2 border col-12">{{$anuncio->nome}}</p>
            </div>
        </div>
    </div>

@endforeach
