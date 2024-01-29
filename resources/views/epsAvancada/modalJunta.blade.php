<!-- Modal Junta -->
<div class="modal fade" id="formJuntaModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog modal-fullscreen">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Junta</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form  class="col-12 p-0 mb-2"  enctype="multipart/form-data">
                    @csrf   
                    <label for="imagem" class="mb-0 mt-1" >Imagem da junta:</label>
                    <select class="form-select" aria-label="Default select example" id="imagem" name="imagem">
                        <option selected disabled>Escolha a imagem da junta</option>
                    </select>                       
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="unidade_medida_cotas" class="mb-0 mt-1">Unidade de medida das cotas:</label>
                            <input type="text" class="form-control" id="nome_processo" placeholder="Unidade de medida das cotas" name="unidade_medida_cotas">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="cota_t" class="mb-0 mt-1" >Cota T:</label>
                            <input type="number" step="0.01" class="form-control" id="cota_t" placeholder="Cota T" name="cota_t">                     
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="cota_r" class="mb-0 mt-1" >Cota R:</label>
                            <input type="number" step="0.01" class="form-control" id="cota_r" placeholder="Cota R" name="cota_r">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="cota_f" class="mb-0 mt-1">Cota F:</label>
                            <input type="number" step="0.01" class="form-control" id="cota_f" placeholder="Cota F" name="cota_f">                     
                        </div>                       
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="angulo_primario" class="mb-0 mt-1">Angulo Primário:</label>
                            <input type="number" step="0.01" class="form-control" id="angulo_primario" placeholder="Angulo Primário" name="angulo_primario">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="angulo_secundario" class="mb-0 mt-1">Angulo Secundário:</label>
                            <input type="number" step="0.01" class="form-control" id="angulo_secundario" placeholder="Angulo Secundário" name="angulo_secundario">                     
                        </div>                       
                    </div> 
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="possui_cobre_junta" class="mb-0 mt-1">Necessidade de cobre na junta?</label>
                            <input type="text" class="form-control" id="possui_cobre_junta" placeholder="Sim/Não" name="possui_cobre_junta">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="material_cobre_junta" class="mb-0 mt-1">Material de cobre na junta:</label>
                            <input type="text" class="form-control" id="material_cobre_junta" placeholder="Material de cobre na junta" name="material_cobre_junta">                     
                        </div>                       
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="retentores" class="mb-0 mt-1">Retentores:</label>
                            <input type="text" class="form-control" id="retentores" placeholder="Retentores" name="retentores">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="abertura_raiz" class="mb-0 mt-1">Abertura da raiz:</label>
                            <input type="number" step="0.01" class="form-control" id="abertura_raiz" placeholder="Material de cobre na junta" name="abertura_raiz">                     
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