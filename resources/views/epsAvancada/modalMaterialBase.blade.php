<!-- Modal Material Base -->
<div class="modal fade" id="formMaterialBaseModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog modal-fullscreen">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Material Base</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form  class="col-12 p-0 mb-2"  enctype="multipart/form-data">
                    @csrf                        
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="p_numero" class="mb-0 mt-1">P número:</label>
                            <input type="number" class="form-control" id="p_numero" placeholder="P número" name="p_numero">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="grupo_n" class="mb-0 mt-1" >Grupo N:</label>
                            <input type="number" class="form-control" id="grupo_n" placeholder="Grupo N" name="grupo_n">                     
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="tipo_grau" class="mb-0 mt-1" >Tipo Grau:</label>
                            <input type="number" step="0.01" class="form-control" id="tipo_grau" placeholder="Tipo Grau" name="tipo_grau">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="metal_base" class="mb-0 mt-1">Metal Base:</label>
                            <input type="number" step="0.01" class="form-control" id="metal_base" placeholder="Metal Base F" name="metal_base">                     
                        </div>                       
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="chanfro" class="mb-0 mt-1">Chanfro:</label>
                            <input type="number" step="0.01" class="form-control" id="chanfro" placeholder="Chanfro" name="chanfro">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="unidade_medida_chanfro" class="mb-0 mt-1">Unidade de Medida do Chanfro:</label>
                            <input type="text" class="form-control" id="unidade_medida_chanfro" placeholder="Unidade de Medida do Chanfro" name="unidade_medida_chanfro">                     
                        </div>                       
                    </div> 
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="tubo" class="mb-0 mt-1">Tubo</label>
                            <input type="text" class="form-control" id="tubo" placeholder="Sim/Não" name="tubo">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="diametro_tubo" class="mb-0 mt-1">Diâmetro do tubo:</label>
                            <input type="number" step="0.01" class="form-control" id="diametro_tubo" placeholder="Diâmetro do tubo" name="diametro_tubo">                     
                        </div>                       
                    </div>                
                    <label for="angulo" class="mb-0 mt-1">Ângulo:</label>
                    <input type="text" class="form-control" id="angulo" placeholder="Ângulo" name="angulo">                                   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </div>
</div>