<!-- Modal Pre Aquecimento -->
<div class="modal fade" id="formPreAquecimentoModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog modal-fullscreen">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pré Aquecimento</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form  class="col-12 p-0 mb-2"  enctype="multipart/form-data">
                    @csrf                        
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="temperatura" class="mb-0 mt-1">Temperatura:</label>
                            <input type="text" class="form-control" id="temperatura" placeholder="Temperatura" name="temperatura">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="temperatura_interpasse" class="mb-0 mt-1" >Temperatura do interpasse:</label>
                            <input type="text" class="form-control" id="temperatura_interpasse" placeholder="Grupo N" name="temperatura_interpasse">                     
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