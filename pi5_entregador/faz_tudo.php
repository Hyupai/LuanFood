<!DOCTYPE html>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = date('d/m/Y');
include_once ('dbCon.php');

if (!isset($_SESSION['entregador_logado'])) {
    header('Location: logout.php');
    exit;
}

  $email = $_SESSION['email'];
  $password = $_SESSION['senha'];
   
  $stmt = $connection->prepare("SELECT * FROM `entregadores` WHERE email = ? AND senha = ?");
  $stmt->bindParam(1, $email);
  $stmt->bindParam(2, $password);

  if($stmt->execute() === TRUE) {
      if($stmt->rowCount() == 0) {
        header('Location: logout.php');
      }
  } 
  
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       $nome_entregador = $row['nome'];
        $email_entregador = $row['email'];
         $codigo_entregador = $row['codigo'];
       $inscricao_entregador = $row['data_inscricao'];
        $inscricao_entregador = new DateTime($inscricao_entregador);
       $inscricao_entregador = $inscricao_entregador->format('d/m/Y');
   }
   
   // Selecionar entregas
    
  $stmt = $connection->prepare("SELECT * FROM `entregas` ORDER BY `id` DESC");
  //$stmt->bindParam(1, $codigo_entregador);
  $stmt->execute();
  
  $entregasDoDiaHtml = "";
  $entregasPendentesEmGeral = "";
  $totalDeEntregasRealizadasHoje = 0;
  $totalDeEntregasFeitasComSucesso = 0;
  $totalDeEntregasCanceladas = 0;
  $totalDeEntregasPendentes = 0;
  $historicoFeitas = "";
  
  
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       
       $nome_cliente = $row['nome_cliente'];
       $endereco_cliente = $row['endereco'];
       $entrega_id = $row['id'];
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
            if($entregador_id != $codigo_entregador) { continue;}
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
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Concluido</p>
                                   <p class='text-muted mb-0'>Data de Conclusão: $data</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 
                                <p class='text-muted mb-0'><button class='btn-primary'  onclick=\"ExibirModal('#ReportarProblema_modal');\">Reportar um problema</button></p>
                              </div>
                            </div>
                          </div>";
                          
        } else if($status == 2) {
            if($entregador_id != $codigo_entregador) { continue;}
            $totalDeEntregasCanceladas++;
        } else {
            if($entregador_id == $codigo_entregador) { 
                $totalDeEntregasPendentes++;
            } else {
             
             if($entregador_id == 0) {
             $entregasPendentesEmGeral .= "<tr>
                                <td>$nome_cliente</td>
                                <td class=\"text-right\"> $data_ </td>
                                 <td>
                              <div class=\"badge badge-outline-success\" style=\"font-size: 0.6rem; padding: 4px; cursor: pointer;\" onclick=\"ExibirModal('#SolicitarFazerEntrega_modal');\">Solicitar Fazer Entrega</div>
                            </td>
                              </tr>";
             }
            }
        }
        
        // Verifica se a diferença é menor que 1 dia
        if ($interval->days < 1) {
              if($entregador_id != $codigo_entregador) { continue;}
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
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Concluido</p>
                                   <p class='text-muted mb-0'>Horario de Conclusão: $hora</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 
                                <p class='text-muted mb-0'><button class='btn-primary'  onclick=\"ExibirModal('#ReportarProblema_modal');\">Reportar um problema</button></p>
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
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Cancelada</p>
                                   <p class='text-muted mb-0'>Horario de Cancelamento: $hora</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 
                                <p class='text-muted mb-0'><button class='btn-primary' onclick=\"ExibirModal('#ReportarProblema_modal');\">Reportar um problema</button></p>
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
                                <p class='text-muted mb-0'>Endereço:$endereco_cliente</p>
                                  <p class='text-muted mb-0'>Status: Pendente</p>
                                   <p class='text-muted mb-0'>Horario de Adesão: $hora</p>
                              </div>
                              <div class='me-auto text-sm-right pt-2 pt-sm-0'>
                                <p class='text-muted'>Ações: </p>
                                 <p class='text-muted mb-0' style='margin-bottom: 6px;'><button style='margin-bottom: 6px;' class='btn-primary' onclick=\"CancelarEntrega('$entrega_id');\">Cancelar Entrega</button></p>
                                <p class='text-muted mb-0'><button class='btn-primary'  onclick=\"ExibirModal('#ReportarProblema_modal');\">Reportar um problema</button></p>
                              </div>
                            </div>
                          </div>";
                
            }
            
            
            
        }
      
   }
   
   
    // Grafico Correspondente as entregas nos ultimos 5 dias
   
    $today = new DateTime();
    $startDate = clone $today;
    $startDate->modify('-4 days');

    $startDateFormatted = $startDate->format('Y-m-d 00:00:00');
    $endDateFormatted = $today->format('Y-m-d 23:59:59');

    $sql = "SELECT DATE(data) as dia, COUNT(*) as num_entregas 
            FROM entregas 
            WHERE data >= :start_date AND data <= :end_date AND entregador_id = '$codigo_entregador' AND status = 1
            GROUP BY DATE(data)
            ORDER BY DATE(data)";
    
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':start_date', $startDateFormatted);
    $stmt->bindParam(':end_date', $endDateFormatted);
    $stmt->execute();

    $entregasPorDia = [];
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $entregasPorDia[$row["dia"]] = $row["num_entregas"];
        }
    }

    $diaLabels = [
        'today' => 'Hoje',
        'yesterday' => 'Ontem',
        '-2 days' => 'Anteontem',
        '-3 days' => 'Há 3 dias',
        '-4 days' => 'Há 4 dias',
    ];

    $diasSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
    $chart1JsDias = array();
    $chart1JsNum = array();
 
    foreach ($diaLabels as $modifier => $label) {
        $date = new DateTime();
        $date->modify($modifier);
        $formattedDate = $date->format('Y-m-d');
        $diaSemana = $diasSemana[$date->format('w')];

        //echo $diaSemana . ": ";
        array_push($chart1JsDias, $diaSemana);
        if (isset($entregasPorDia[$formattedDate])) {
           
            
            //echo $entregasPorDia[$formattedDate] . " entregas";
              array_push($chart1JsNum, $entregasPorDia[$formattedDate]);
            
            
        } else {
            
            //echo "0 entregas";
             array_push($chart1JsNum, 0);
        }
        
        
    }
    
    $chart1Js = "var areaData = {
    labels: [\"" . $chart1JsDias[4] . "\", \"" . $chart1JsDias[3] . "\", \"" . $chart1JsDias[2] . "\", \"" . $chart1JsDias[1] . "\", \"" . $chart1JsDias[0] . "\"],
    datasets: [{
      label: 'Numero de entregas feitas',
      data: [" . $chart1JsNum[4] . "," .$chart1JsNum[3] . "," . $chart1JsNum[2] . "," .$chart1JsNum[1] . "," . $chart1JsNum[0] ."],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: true, // 3: no fill
    }]
  };

  var areaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    },
    scales: {
      yAxes: [{
        gridLines: {
          color: \"rgba(204, 204, 204,0.1)\"
        }
      }],
      xAxes: [{
        gridLines: {
          color: \"rgba(204, 204, 204,0.1)\"
        }
      }]
    }
  }";
  
  
  // Grafico Correspondente a entregas por status:
  
  $chart2Js = "  var doughnutPieData = {
    datasets: [{
      data: [$totalDeEntregasCanceladas, $totalDeEntregasFeitasComSucesso, $totalDeEntregasPendentes],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
      'Canceladas',
      'Realizadas',
      'Pendentes',
    ]
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };";
   
   
   include 'header.php';
   include 'modais.php';
   include 'footer.php';
 
?>