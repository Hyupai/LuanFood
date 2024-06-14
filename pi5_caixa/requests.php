
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
  
  $data = json_decode(file_get_contents("php://input"));
    if(isset($data->request)) {
        $request = $data->request;
    } else {
        $request = "";
    }

    if($request == "FiltrarEntregasPorData") {

        $specificDate = $data->informations;
        

           $specificDateFormatted = $specificDate . ' 00:00:00';
            $nextDayFormatted = date('Y-m-d 23:59:59', strtotime($specificDate));

            $sql = "SELECT * FROM entregas 
                    WHERE data >= :specific_date AND data <= :next_day";
            
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':specific_date', $specificDateFormatted);
            $stmt->bindParam(':next_day', $nextDayFormatted);
            $stmt->execute();

            if($stmt->rowCount() == 0) {
                  $conteudoHtml = "<p>Nenhuma entrega encontrada nessa data!</p>";
                   echo(json_encode(["Success", "$conteudoHtml"]));
                    exit;
            } else {
                  $conteudoHtml = "";
            }
          

             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       
               $nome_cliente = $row['nome_cliente'];
               $entrega_id = $row['entrega_id'];
               $endereco_cliente = $row['endereco'];
               $status = $row['status'];
               $data = $row['data'];
               $entregador_id = $row['entregador_id'];
               $data_to_format = new DateTime($data);
               $hora = $data_to_format->format('H:i');
               $data_ = $data_to_format->format('d/m H:i');
       
               // Status 1-CONCLUIDO 2-CANCELADA 3-PENDENTE
       
                $date1 = new DateTime($data);
                $date2 = new DateTime(date('Y/m/d H:i:s'));
                $interval = $date1->diff($date2);
        
                if($status == 1) {
                    
            
                     $conteudoHtml .= "<div class='preview-item border-bottom'>
                                    <div class='preview-thumbnail'>
                                      <div class='preview-icon bg-success'>
                                        <i class='mdi mdi-check-circle'></i>
                                      </div>
                                    </div>
                                    <div class='preview-item-content d-sm-flex flex-grow'>
                                      <div class='flex-grow'>
                                        <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
                                        <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                          <p class='text-muted mb-0'>Status: Concluido</p>
                                           <p class='text-muted mb-0'>Data de Conclusão: $data</p>
                                      </div>
                                      <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                        <p class='text-muted'>Ações: </p>
                                 
                        
                                        <p class='text-muted mb-0'><button class='btn-primary' style='width:140px; margin-top: 6px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
    
                                      </div>
                                    </div>
                                  </div>";
                          
                } else if($status == 2) {
                    
                    $conteudoHtml .= "<div class='preview-item border-bottom'>
                                    <div class='preview-thumbnail'>
                                      <div class='preview-icon bg-danger'>
                                        <i class='mdi mdi-close-circle'></i>
                                      </div>
                                    </div>
                                    <div class='preview-item-content d-sm-flex flex-grow'>
                                      <div class='flex-grow'>
                                        <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
                                        <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                          <p class='text-muted mb-0'>Status: Cancelada</p>
                                           <p class='text-muted mb-0'>Data de Cancelamento: $data</p>
                                      </div>
                                      <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                        <p class='text-muted'>Ações: </p>
                                 
                        
                                        <p class='text-muted mb-0'><button class='btn-primary' style='width:140px; margin-top: 6px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
    
                                      </div>
                                    </div>
                                  </div>";
                } else {
                    
                      $conteudoHtml .= "<div class='preview-item border-bottom'>
                                    <div class='preview-thumbnail'>
                                      <div class='preview-icon bg-warning'>
                                        <i class='mdi mdi-alert-circle'></i>
                                      </div>
                                    </div>
                                    <div class='preview-item-content d-sm-flex flex-grow'>
                                      <div class='flex-grow'>
                                        <h6 class='preview-subject'>Cliente: $nome_cliente</h6>
                                        <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                          <p class='text-muted mb-0'>Status: Pendente</p>
                                           <p class='text-muted mb-0'>Data de Adesão: $data</p>
                                      </div>
                                      <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                        <p class='text-muted'>Ações: </p>
                                 
                        
                                        <p class='text-muted mb-0'><button class='btn-primary' style='width:140px; margin-top: 6px;' onclick=\"AbrirOutrasAcoes('$entrega_id');\">Outras Ações</button></p>
                                         <p class='text-muted mb-0' style='margin-bottom: 6px;'><button style='margin-bottom: 6px; width:140px;' class='btn-primary' onclick=\"ExibirModal('#CancelarEntrega_modal');\">Cancelar Entrega</button></p>
                               
                                      </div>
                                    </div>
                                  </div>";

                    
                }
             }

         echo(json_encode(["Success", "$conteudoHtml"]));
         exit;

    }


    if($request == "CancelarEntrega") {

        $entrega_id = $data->informations;  
        $sql = "UPDATE entregas SET status = 2 WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $entrega_id);
        $stmt->execute();

        echo(json_encode(["Success", ""]));
        exit;

    }

    if($request == "AtribuirEntregador_get") {

        $entrega_id = $data->informations;
        $stmt = $connection->prepare("SELECT * FROM entregadores");
        $stmt->execute();

         $conteudoHtml = '<form class="forms-sample" method="POST">
                      <div class="form-group" style="background: #fff;">
                      <label style="color: black;">Selecione o entregador que ficara responsavel por essa entrega:</label>
                      <select class="js-example-basic-single select2-hidden-accessible" style="width:100%" data-select2-id="1" id="AtribuirEntregador_select" tabindex="-1" aria-hidden="true">';

        while($entregador = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $conteudoHtml .= "<option value='".$entregador['codigo']."'>".$entregador['nome']."</option>";
        }

       

         $conteudoHtml .= '
                      </select>
                    </div>
                     
                    <button type="button" class="btn btn-primary mb-2" onclick="AtribuirEntregador(\''. $entrega_id .'\');">Enviar</button>
                      
                    </form>';


        echo(json_encode(["Success", "$conteudoHtml"]));
        exit;
    
    }

    if($request == "AtribuirEntregador_submit") {

        $info = $data->informations;  
        $entrega_id = $info[0];
        $entregador_id = $info[1];

        $sql = "UPDATE entregas SET entregador_id = ? WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $entregador_id);
        $stmt->bindParam(2, $entrega_id);
        $stmt->execute();

        echo(json_encode(["Success", ""]));
        exit;

    }


    

 
?>