<?php

$modais='
      <!--      Modal Atribuir Entregador    -->
     
     
      <div class="modal fade" id="AtribuirEntregador_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Atribuir Entregador</h5>
       
      </div>
      <div class="modal-body" style="border:none;" id="AtribuirEntregador_body">
      
      </div>
      <div class="modal-footer" style="border: none;">
       
      </div>
    </div>
  </div>
</div>


  <!--      Modal Cancelar Entrega -->
      
      <div class="modal fade" id="CancelarEntrega_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Aviso</h5>
       
      </div>
      <div class="modal-body" style="border:none;">
       <div class="row">
                      <div class="col-8 col-sm-12 col-xl-12 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                         
                          <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                        </div>
                        
                      </div>
                      <div class="col-4 col-sm-12 col-xl-12 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-close text-danger ms-auto"></i>
                      </div>
                       <br><br><h6 class="text-muted font-weight-normal" style="display:flex; justify-content: center;">Entrega selecionada foi cancelada!</h6>
                    </div>
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn-primary" onclick="FecharModal(\'#CancelarEntrega_modal\', 1);">OK</button>
      </div>
    </div>
  </div>
</div>

      
      <!--      Modal Entregador Atribuido    -->
      
      <div class="modal fade" id="EntregadorAtribuido_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Aviso</h5>
       
      </div>
      <div class="modal-body" style="border:none;">
       <div class="row">
                      <div class="col-8 col-sm-12 col-xl-12 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                         
                          <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                        </div>
                        
                      </div>
                      <div class="col-4 col-sm-12 col-xl-12 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-check text-primary ms-auto"></i>
                      </div>
                       <br><br><h6 class="text-muted font-weight-normal" style="display:flex; justify-content: center;">Entregador Atriibuido!</h6>
                    </div>
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn-primary" onclick="FecharModal(\'#EntregadorAtribuido_modal\', 1);">OK</button>
      </div>
    </div>
  </div>
</div>


      <!--      Modal Outras Ações    -->
      
      <div class="modal fade" id="OutrasAcoes_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Outras Acoes</h5>
       
      </div>
      <div class="modal-body" style="border:none;" id="OutrasAcoes_body">
      
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn-primary" onclick="FecharModal(\'#EntregadorAtribuido_modal\', 1);">OK</button>
      </div>
    </div>
  </div>
</div>';




?>