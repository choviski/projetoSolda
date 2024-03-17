<!-- Formulario de Posição de Soldagem-->
<div name="sub-form-posicao-soldagem" id="sub-form-posicao-soldagem" style="display: none;">
    <h6 class="text-left">Posição de Soldagem</i></h6>
    <hr class="mt-0">             
    <form  class="col-12 p-0 mb-2" id="form-posicao-soldagem"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_processo">
        <input type="hidden" name="id_posicao_soldagem">  
        <label for="artigo" class="mb-0 mt-0" >Artigo:</label>
        <input type="text" class="form-control" id="artigo" placeholder="Artigo da Posição de soldagem" name="artigo">                        
        <div class="form-row">
            <div class="form-col col-6">
                <label for="posicao_soldagem" class="mb-0 mt-1">Posição de soldagem:</label>
                <select class="form-select" aria-label="Default select example" id="posicao_soldagem" name="posicao_soldagem">
                    <option selected disabled>Escolha a posição de soldagem</option>
                    <option value="1F">Plana - 1F</option>
                    <option value="1G">Plana - 1G</option>
                    <option value="2F">Horizontal - 2F</option>
                    <option value="2G">Horizontal - 2G</option>
                    <option value="3F">Vertical - 3F</option>
                    <option value="3G">Vertical - 3G</option>
                    <option value="4F">Sobre cabeça - 4F</option>
                    <option value="4G">Sobre cabeça - 4G</option>
                    <option value="5G">Tubo na vertical - 5G</option>
                    <option value="6G">Quase todas as posições - 5G</option>
                </select>                     
            </div>
            <div class="form-col col-6">
                <label for="direcao_soldagem" class="mb-0 mt-1" >Direção de soldagem:</label>
                <select  class="form-control" id="direcao_soldagem"  name="direcao_soldagem">
                    <option selected disabled>Escolha a direção de soldagem</option>
                    <option value="ascendente">Ascedente</option> 
                    <option value="descendente">Descendente</option> 
                    <option value="n/a">N/A</option> 
                </select>                     
            </div>
        </div>
        <a class="btn btn-block btn-primary mt-2" onclick="adicionaPosicaoSoldagem()">Continuar</a>                                   
        <a class="btn btn-block btn-outline-danger mt-2" onclick="mostraAba('metal-adicao')">Voltar</a>                                                      
    </form>
</div>

<script>
    function adicionaPosicaoSoldagem(){
        var formData = $("#form-posicao-soldagem").serialize();
        var linkAjax = '{{route("cadastraOuEditaPosicaoSoldagem")}}';
        $.ajax({
            url: linkAjax,
            type: "GET",
            data: formData,
            dataType: "json", 
            success: function(data) {
                $('input[name="id_posicao_soldagem"]').val(data["id"]);                
                mostraAba("pre-aquecimento");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Erro! Verifique se todos os campos estão preenchidos corretamente");
            }
        });
    };   
</script>