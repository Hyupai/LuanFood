<?php include('faz_tudo.php'); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo "Luan Food";?> - Lista de Entregadores</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
        
        .table th { color: #fff !important; }
        .table td { color: #ababab !important; }
        
    </style>
  </head>

  <body>
      
      <?php echo $modais; ?>
         
    
    <div class="container-scroller">
     
      <?php echo $header;?>
      
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           
           
            <div class="row">
              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Lista dos Entregadores Registrados</h4>
                   
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> Codigo </th>
                            <th> Nome </th>
                            <th> Email </th>
                            <th> Data de Inscrição </th>
                             
                              <th> Ações </th>
                          </tr>
                        </thead>
                        <tbody id="TabelaEntregadores">
                          

                        <?php

                            $sql = "SELECT * FROM `entregadores`";
                            $stmt = $connection->prepare($sql);
                            $stmt->execute();
                            $num = $stmt->rowCount();

                            if($num <= 0) {
                                echo "<td>Nenhum entregador foi encontrado registrado!</td>";
                            } else {
                                
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                    $codigo = $row["codigo"];
                                    $nome = $row['nome'];
                                    $email = $row['email'];
                                    $data_inscricao = $row["data_inscricao"];

                                    echo "<tr>";
                                    echo "<td>$codigo</td>";
                                     echo "<td>$nome</td>";
                                      echo "<td>$email</td>";
                                       echo "<td>$data_inscricao</td>";
                                        echo "<td style=\"text-align: center;\"><button onclick=\"RemoverEntregador('$codigo');\" type='button' class='btn btn-danger btn-fw'>Remover</button> <button onclick=\"EditarEntregador('$codigo');\" type='button' class='btn btn-primary btn-fw'>Editar</button></td>";
                                        echo "</tr>";
                                }
                            }
        
                   

                        ?>
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
     
            
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script>
    
    function RemoverEntregador(codigo) {

        if(confirm('Tem certeza que deseja remove-lo?')) {
            window.location.href ='remover_entregador.php?codigo=' + codigo;
        }
    }

    function EditarEntregador(codigo) {

        window.location.href='editar_entregador.php?codigo=' + codigo;
    }
    
    
    </script>
   
    <!-- End custom js for this page -->
  </body>
  
</html>