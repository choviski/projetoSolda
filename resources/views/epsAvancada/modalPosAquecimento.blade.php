<!-- Modal Pos Aquecimento -->
<div class="modal fade" id="formPosAquecimentoModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog modal-fullscreen">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pós Aquecimento</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form  class="col-12 p-0 mb-2"  enctype="multipart/form-data">
                    @csrf                        
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="faixa_temperatura" class="mb-0 mt-1">Faixa de Temperatura:</label>
                            <input type="number" step="0.01" class="form-control" id="faixa_temperatura" placeholder="Faixa de Temperatura" name="faixa_temperatura">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="taxa_aquecimento" class="mb-0 mt-1" >Taxa de Aquecimento:</label>
                            <input type="number" step="0.01" class="form-control" id="taxa_aquecimento" placeholder="Grupo N" name="taxa_aquecimento">                     
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="tempo_permanencia" class="mb-0 mt-1">Tempo de Permanencia:</label>
                            <input type="number" step="0.01" class="form-control" id="tempo_permanencia" placeholder="Tempo de Permanencia" name="tempo_permanencia">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="taxa_resfriamento" class="mb-0 mt-1" >Taxa de Resfriamento:</label>
                            <input type="number" step="0.01" class="form-control" id="taxa_resfriamento" placeholder="Taxa de Resfriamento" name="taxa_resfriamento">                     
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