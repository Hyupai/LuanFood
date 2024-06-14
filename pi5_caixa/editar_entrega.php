<?php include('faz_tudo.php'); ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrador - Registrar Entrega</title>
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
  </head>
  <body>
    <div class="container-scroller">
     
      <?php echo $header;?>
       <?php echo $modais; 
       

        $entrega_id = $_GET['id'];
        $stmt = $connection->prepare("SELECT * FROM `entregas` WHERE id = ?");
        $stmt->bindParam(1, $entrega_id);
        $stmt->execute();
       
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
           $nome_cliente = $row['nome_cliente'];
           $endereco_cliente = $row['endereco'];
           $status = $row['status'];
           $entregador_ent = $row['entregador_id'];
        }

       // Verifica se os dados foram enviados via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = $_POST;
            $entrega_id = $_GET['id'];
            $stmt = $connection->prepare("UPDATE entregas SET nome_cliente = ?, endereco = ?, entregador_id = ?, status = ? WHERE id = '$entrega_id'");
            $stmt->bindParam(1, $dados['nome']);
            $stmt->bindParam(2, $dados['endereco']);
            $stmt->bindParam(3, $dados['entregador']);
            $stmt->bindParam(4, $dados['status']);

            // Executa o statement
            if ($stmt->execute()) {
                echo "<script>alert('Dados inseridos com sucesso!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Erro ao inserir os dados.'); window.location.href='index.php';</script>";
            }
        } else {
            //echo "Nenhum dado enviado via POST.";
        }

       ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row" style="display:flex; justify-content: center;"> 
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cadastrar entrega:</h4>
                  
                    <form method="POST" class="col-12" autocomplete="off" class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nome cliente: </label>
                        <input style="color: white !important;" type="text" name="nome" class="form-control" id="exampleInputUsername1" value="<?php echo $nome_cliente;?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Endereço:</label>
                        <input style="color: white !important;" type="text" name="endereco" class="form-control" id="exampleInputEmail1" value="<?php echo $endereco_cliente;?>">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Entregador:</label>
                        <select style="color: white !important;" class="form-control" name="status">
                        <option value="1" <?php if($status == 1) { echo 'selected';}?>>Feita</option>
                        <option value="2" <?php if($status == 2) { echo 'selected';}?>>Cancelada</option>
                        <option value="3" <?php if($status == 3) { echo 'selected';}?>>Pendente</option>
                          
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Entregador:</label>
                        <select style="color: white !important;" class="form-control" name="entregador">
                        <option value="0">Não definido</option>
                          <?php
                            $stmt = $connection->prepare("SELECT * FROM entregadores");
                            $stmt->execute();
                            while($entregador = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo "<option value='".$entregador['codigo'] . "'"; if($entregador_ent == $entregador['codigo']) { echo 'selected';} echo ">".$entregador['nome']."</option>";
                            }
                          ?>
                        </select>
                      </div>

                      <button type="submit" class="btn btn-success">Enviar</button>
                
                    </form>
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
    <!-- End custom js for this page -->
  </body>
</html>