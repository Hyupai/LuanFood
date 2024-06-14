<!DOCTYPE html>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = date('d/m/Y');
include_once ('dbCon.php');

if (!isset($_SESSION['administrador_logado'])) {
    header('Location: logout.php');
    exit;
}

  $codigo = $_SESSION['codigo'];
  $password = $_SESSION['senha'];
   
  $stmt = $connection->prepare("SELECT * FROM `administradores` WHERE codigo = ? AND senha = ?");
  $stmt->bindParam(1, $codigo);
  $stmt->bindParam(2, $password);

  if($stmt->execute() === TRUE) {
      if($stmt->rowCount() == 0) {
        header('Location: logout.php');
      }
  } 
  
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
       $nome_administrador = $row['nome'];
        $email_administrador = $row['email'];
         $codigo_administrador = $row['codigo'];
       $inscricao_administrador = $row['data_inscricao'];
        $inscricao_administrador = new DateTime($inscricao_administrador);
       $inscricao_administrador = $inscricao_administrador->format('d/m/Y');
      
   }
   
   // Selecionar entregas
    

  $stmt = $connection->prepare("SELECT * FROM `entregas` ORDER BY `id` DESC");
  $stmt->execute();
  
  $entregasDoDiaHtml = "";
  $entregasPendentesSemAtribuicaoDeEntregador = "<td style='color: yellow;'>Nenhuma entrega sem entregador atribuido encontrada!</td>";
  $totalDeEntregasRealizadasHoje = 0;
  $totalDeEntregasFeitasComSucesso = 0;
  $totalDeEntregasCanceladas = 0;
  $totalDeEntregasPendentes = 0;
  $historicoFeitas = "";
    $historicoCanceladas = "";
      $historicoPendentes = "";
  
  
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       
       $entrega_id = $row['id'];
       $nome_cliente = $row['nome_cliente'];
       $endereco_cliente = $row['endereco'];
       $status = $row['status'];
       $data = $row['data'];
       $entregador_id = $row['entregador_id'];
       $sql = "SELECT nome FROM entregadores WHERE codigo = '$entregador_id'";
       $stmt2 = $connection->prepare($sql);
       $stmt2->execute();
       $nome_entregador = $stmt2->fetchColumn();

       $data_to_format = new DateTime($data);
       $hora = $data_to_format->format('H:i');
       $data_ = $data_to_format->format('d/m H:i');
       
       // Status 1-CONCLUIDO 2-CANCELADA 3-PENDENTE
       
        $date1 = new DateTime($data);
        $date2 = new DateTime(date('Y/m/d H:i:s'));
        $interval = $date1->diff($date2);
        
        if($status == 1) {
            if($entregador_id == 0) {continue;}
            $totalDeEntregasFeitasComSucesso++;
            
             $historicoFeitas .= "<div class='preview-item border-bottom'>
                            <div class='preview-thumbnail'>
                              <div class='preview-icon bg-success'>
                                <i class='mdi mdi-check-circle'></i>
                              </div>
                            </div>
                            <div class='preview-item-content d-sm-flex flex-grow'>
                              <div class='flex-grow'>
                                <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
                                <b style='color: white !important; font-weight: 300 ;' class='text-muted mb-0'>Entregador:$nome_entregador</b>
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Concluido</p>
                                   <p class='text-muted mb-0'>Data de Conclusão: $data</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 
                        
                                <p class='text-muted mb-0'><button class='btn-primary' style='margin-bottom: 6px; width:140px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
    
                              </div>
                            </div>
                          </div>";
                          
        } else if($status == 2) {
                if($entregador_id == 0) {continue;}
            $totalDeEntregasCanceladas++;
            $historicoCanceladas .= "<div class='preview-item border-bottom'>
                            <div class='preview-thumbnail'>
                              <div class='preview-icon bg-danger'>
                                <i class='mdi mdi-close-circle'></i>
                              </div>
                            </div>
                            <div class='preview-item-content d-sm-flex flex-grow'>
                              <div class='flex-grow'>

                                <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
 <b style='color: white !important; font-weight: 300 ;' class='text-muted mb-0'>Entregador:$nome_entregador</b>
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Cancelada</p>
                                   <p class='text-muted mb-0'>Data de Cancelamento: $data</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 
                        
                                <p class='text-muted mb-0'><button class='btn-primary' style='margin-bottom: 6px; width:140px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
    
                              </div>
                            </div>
                          </div>";
        } else {
             $totalDeEntregasPendentes++;
              $historicoPendentes .= "<div class='preview-item border-bottom'>
                            <div class='preview-thumbnail'>
                              <div class='preview-icon bg-warning'>
                                <i class='mdi mdi-alert-circle'></i>
                              </div>
                            </div>
                            <div class='preview-item-content d-sm-flex flex-grow'>
                              <div class='flex-grow'>
                                <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
 <b style='color: white !important; font-weight: 300 ;' class='text-muted mb-0'>Entregador:$nome_entregador</b>
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Pendente</p>
                                   <p class='text-muted mb-0'>Data de Adesão: $data</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 
                        
                                <p class='text-muted mb-0'><button class='btn-primary' style='margin-bottom: 6px; width:140px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
     <p class='text-muted mb-0' style='margin-bottom: 6px;'><button style='margin-bottom: 6px; width:140px;' class='btn-primary' onclick=\"CancelarEntrega('$entrega_id');\">Cancelar Entrega</button></p>
                               
                              </div>
                            </div>
                          </div>";

             if($entregador_id == 0) {
                 if($entregasPendentesSemAtribuicaoDeEntregador == "<td style='color: yellow;'>Nenhuma entrega sem entregador atribuido encontrada!</td>") {
                     $entregasPendentesSemAtribuicaoDeEntregador = "";
                 }
                 $entregasPendentesSemAtribuicaoDeEntregador .= "<tr>
                                    <td>$nome_cliente</td>
                                    <td class=\"text-right\"> $data_ </td>
                                     <td>
                                  <div class=\"badge badge-outline-success\" style=\"font-size: 0.6rem; padding: 4px; cursor: pointer;\" onclick=\"AbrirAtribuirEntregador('$entrega_id');\">Atribuir entregador</div>
                                </td>
                                  </tr>";
             }
        }
        
        // Verifica se a diferença é menor que 1 dia
        if ($interval->days < 1) {
                if($entregador_id == 0) {continue;}
            
            if($status  == 1) {
                
                    $totalDeEntregasRealizadasHoje++;
                
                     $entregasDoDiaHtml .= "<div class='preview-item border-bottom'>
                            <div class='preview-thumbnail'>
                              <div class='preview-icon bg-success'>
                                <i class='mdi mdi-check-circle'></i>
                              </div>
                            </div>
                            <div class='preview-item-content d-sm-flex flex-grow'>
                              <div class='flex-grow'>
                                <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
 <b style='color: white !important; font-weight: 300 ;' class='text-muted mb-0'>Entregador:$nome_entregador</b>
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Concluido</p>
                                   <p class='text-muted mb-0'>Horario de Conclusão: $hora</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 
                       
                                <p class='text-muted mb-0'><button class='btn-primary' style='margin-top: 6px; width:140px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
                              </div>
                            </div>
                          </div>";
                
                
            } else if($status == 2) {
                
                 $entregasDoDiaHtml .= "<div class='preview-item border-bottom'>
                            <div class='preview-thumbnail'>
                              <div class='preview-icon bg-danger'>
                                <i class='mdi mdi-close-circle'></i>
                              </div>
                            </div>
                            <div class='preview-item-content d-sm-flex flex-grow'>
                              <div class='flex-grow'>
                                <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
 <b style='color: white !important; font-weight: 300 ;' class='text-muted mb-0'>Entregador:$nome_entregador</b>
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Cancelada</p>
                                   <p class='text-muted mb-0'>Horario de Cancelamento: $hora</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 
                               
                                 <p class='text-muted mb-0'><button class='btn-primary' style='margin-top: 6px; width:140px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
                              </div>
                            </div>
                          </div>";
                
            } else {
                
                 $entregasDoDiaHtml .= "<div class='preview-item border-bottom'>
                            <div class='preview-thumbnail'>
                              <div class='preview-icon bg-warning'>
                                <i class='mdi mdi-alert-circle'></i>
                              </div>
                            </div>
                            <div class='preview-item-content d-sm-flex flex-grow'>
                              <div class='flex-grow'>
                                <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
 <b style='color: white !important; font-weight: 300 ;' class='text-muted mb-0'>Entregador:$nome_entregador</b>
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Pendente</p>
                                   <p class='text-muted mb-0'>Horario de Adesão: $hora</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 <p class='text-muted mb-0' style='margin-bottom: 6px;'><button style='margin-bottom: 6px; width:140px;' class='btn-primary' onclick=\"CancelarEntrega('$entrega_id');\">Cancelar Entrega</button></p>
                               
                                 <p class='text-muted mb-0'><button class='btn-primary' style='margin-top: 6px; width:140px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
                              </div>
                            </div>
                          </div>";
                
            }
            
            
            
        } 
      
   }
   
   
   include 'header.php';
      include 'modais.php';
        include 'footer.php';
 
?>