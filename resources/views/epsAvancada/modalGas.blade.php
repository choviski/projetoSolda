<!-- Modal Gas -->
<div class="modal fade" id="formGasModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog modal-fullscreen">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gas</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form  class="col-12 p-0 mb-2"  enctype="multipart/form-data">
                    @csrf                        
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="gas_protecao" class="mb-0 mt-1">Gás de Proteção:</label>
                            <input type="text" class="form-control" id="gas_protecao" placeholder="Gás de Proteção" name="gas_protecao">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="composicao" class="mb-0 mt-1" >Composição:</label>
                            <input type="number" step="0.01" class="form-control" id="composicao" placeholder="Composição" name="composicao">                     
                        </div>
                    </div> 

                    <label for="vazao" class="mb-0 mt-1">Vazão:</label>
                    <input type="text" class="form-control" id="vazao" placeholder="Vazão" name="vazao">                     
                 
                    <div class="form-row">                      
                        <div class="form-col col-6">
                            <label for="possui_purga" class="mb-0 mt-1" >Possui Purga?</label>
                            <input type="text" class="form-control" id="possui_purga" placeholder="Sim/Não" name="possui_purga">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="purga" class="mb-0 mt-1" >Purga:</label>
                            <input type="text" class="form-control" id="purga" placeholder="Purga" name="purga">                     
                        </div>
                    </div>  
                    
                    <div class="form-row">                      
                        <div class="form-col col-6">
                            <label for="composicao_purga" class="mb-0 mt-1" >Composição da Purga?</label>
                            <input type="number" step="0.01" class="form-control" id="composicao_purga" placeholder="Composição da Purga" name="composicao_purga">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="vazao_purga" class="mb-0 mt-1" >Vazão da Purga:</label>
                            <input type="number" step="0.01" class="form-control" id="vazao_purga" placeholder="Purga" name="vazao_purga">                     
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