<?php

$modais='
      <!--      Modal Solicitar Fazer Entrega    -->
      
      <div class="modal fade" id="SolicitarFazerEntrega_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                      <div class="col-12 col-sm-12 col-xl-12 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-check text-primary ms-auto"></i>
                      </div>
                       <br><br><h6 class="text-muted font-weight-normal" style="display:flex; justify-content: center;">Sua solicitação foi enviada aos administradores!</h6>
                    </div>
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn-primary" onclick="FecharModal(\'#SolicitarFazerEntrega_modal\');">OK</button>
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
                      <div class="col-12 col-sm-12 col-xl-12 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-close text-danger ms-auto"></i>
                      </div>
                       <br><br><h6 class="text-muted font-weight-normal" style="display:flex; justify-content: center;">Entrega selecionada foi cancelada!</h6>
                    </div>
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn-primary" onclick="FecharModal(\'#CancelarEntrega_modal\');">OK</button>
      </div>
    </div>
  </div>
</div>

 <!--      Modal Reportar Problema -->
      
      <div class="modal fade" id="ReportarProblema_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Reportar Problema</h5>
       
      </div>
      <div class="modal-body" style="border:none;">
       <form class="forms-sample" method="POST">
                      <div class="form-group" style="background: #fff;">
                      <label style="color: black;">Selecione o motivo:</label>
                      <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option value="AL" data-select2-id="3">Pedido Incorreto</option>
                        <option value="WY" data-select2-id="16">Cliente Ausente</option>
                        <option value="AM" data-select2-id="17">Pedido Incompleto</option>
                        <option value="CA" data-select2-id="18">Local Inexistente</option>
                        <option value="RU" data-select2-id="19">Outro</option>
                      </select>
                    </div>
                      <div class="form-group" style="background: #fff;">
                        <label for="exampleInputEmail1"style="color: black;">Comentario:</label>
                        <input style="color: black; background: #fff;" type="text" class="form-control" name="comentario_report" id="comentario_report" placeholder="Conte mais sobre o problema..." required>
                      </div>
                     <button type="button" class="btn btn-primary mb-2" onclick="FecharModal(\'#ReportarProblema_modal\');ExibirModal(\'#ProblemaReportado_modal\');">Enviar</button>
                      
                    </form>
      </div>
      <div class="modal-footer" style="border: none;">
       
      </div>
    </div>
  </div>
</div>

      
      <!--      Modal Problema Reportado    -->
      
      <div class="modal fade" id="ProblemaReportado_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                      <div class="col-12 col-sm-12 col-xl-12 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-check text-primary ms-auto"></i>
                      </div>
                       <br><br><h6 class="text-muted font-weight-normal" style="display:flex; justify-content: center;">Problema reportado!</h6>
                    </div>
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn-primary" onclick="FecharModal(\'#ProblemaReportado_modal\');">OK</button>
      </div>
    </div>
  </div>
</div>';




?>