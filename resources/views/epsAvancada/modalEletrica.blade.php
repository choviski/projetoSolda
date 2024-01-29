<!-- Modal Eletrica -->
<div class="modal fade" id="formEletricaModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog modal-fullscreen">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Características Elétricas</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form  class="col-12 p-0 mb-2"  enctype="multipart/form-data">
                    @csrf                        
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="tipo_corrente" class="mb-0 mt-1">Tipo de Corrente:</label>
                            <input type="text" class="form-control" id="tipo_corrente" placeholder="Tipo de Corrente" name="tipo_corrente">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="polaridade" class="mb-0 mt-1" >Polaridade:</label>
                            <input type="number" step="0.01" class="form-control" id="polaridade" placeholder="Polaridade" name="polaridade">                     
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="amperes" class="mb-0 mt-1">Amperes:</label>
                            <input type="number" step="0.01" class="form-control" id="amperes" placeholder="Amperes" name="amperes">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="volts" class="mb-0 mt-1" >Volts:</label>
                            <input type="number" step="0.01" class="form-control" id="volts" placeholder="Volts" name="volts">                     
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="velocidade" class="mb-0 mt-1">Velocidade:</label>
                            <input type="number" step="0.01" class="form-control" id="velocidade" placeholder="Velocidade" name="velocidade">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="camada" class="mb-0 mt-1">Camada:</label>
                            <input type="text" class="form-control" id="camada" placeholder="Camada" name="camada">                     
                        </div>
                    </div>
                    <label for="tig" class="mb-0 mt-1">Tig?</label>
                    <input type="text" class="form-control" id="tig" placeholder="Sim/Não" name="tig">    
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="diametro_eletrodo_tig" class="mb-0 mt-1">Diâmetro do Eletredo TIG:</label>
                            <input type="number" step="0.01" class="form-control" id="diametro_eletrodo_tig" placeholder="Diâmetro do Eletredo TIG" name="diametro_eletrodo_tig">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="classificacao_consumivel_tig" class="mb-0 mt-1">Classificação do Consumível TIG:</label>
                            <input type="text" class="form-control" id="classificacao_consumivel_tig" placeholder="Classificação do Consumível TIG" name="classificacao_consumivel_tig">                     
                        </div>
                    </div>                 
                                                                   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </div>
</div>