<!-- Modal Metal Adição -->
<div class="modal fade" id="formMetalAdicaoModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog modal-fullscreen">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Metal de Adição</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form  class="col-12 p-0 mb-2"  enctype="multipart/form-data">
                    @csrf                        
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="f_numero" class="mb-0 mt-1">F número:</label>
                            <input type="number" class="form-control" id="f_numero" placeholder="F número" name="f_numero">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="a_numero" class="mb-0 mt-1" >A número:</label>
                            <input type="number" class="form-control" id="a_numero" placeholder="A número" name="a_numero">                     
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="diametro_consumivel" class="mb-0 mt-1" >Diâmetro do Consumível:</label>
                            <input type="number" step="0.01" class="form-control" id="diametro_consumivel" placeholder="Diãmetro do Consumível" name="diametro_consumivel">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="material_depositado" class="mb-0 mt-1">Metal Depositado:</label>
                            <input type="number" step="0.01" class="form-control" id="material_depositado" placeholder="Metal depositado" name="metal_depositado">                     
                        </div>                       
                    </div>
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="possui_metal_suplementar" class="mb-0 mt-1">Possui Metal Suplementar:</label>
                            <input type="text" class="form-control" id="possui_metal_suplementar" placeholder="Sim/Não" name="possui_metal_suplementar">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="metal_suplementar" class="mb-0 mt-1">Metal Suplementar:</label>
                            <input type="text" class="form-control" id="metal_suplementar" placeholder="Metal Suplementar" name="metal_suplementar">                     
                        </div>                       
                    </div> 
                    <div class="form-row">
                        <div class="form-col col-6">
                            <label for="marca_material" class="mb-0 mt-1">Marca do material</label>
                            <input type="text" class="form-control" id="marca_material" placeholder="Marca do material" name="marca_material">                     
                        </div>
                        <div class="form-col col-6">
                            <label for="classificacao_aws" class="mb-0 mt-1">Classificação AWS:</label>
                            <select class="form-select" aria-label="Default select example" id="classificacao_aws" name="classificacao_aws">
                                <option selected disabled>Escolha a classificação AWS</option>
                            </select>  
                        </div>                       
                    </div>                
                    <label for="forma_consumivel" class="mb-0 mt-1">Forma do consumível:</label>
                    <input type="text" class="form-control" id="forma_consumivel" placeholder="Forma do consumível" name="forma_consumivel">                                   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </div>
</div>