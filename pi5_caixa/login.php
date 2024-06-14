<!DOCTYPE html>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.gc_maxlifetime', 3600);

session_start();
date_default_timezone_set('America/Sao_Paulo');
include_once ('dbCon.php');

if (isset($_SESSION['administrador_logado'])) {
    header('Location: index.php');
    exit;
}

if(isset($_POST['codigo']) && isset($_POST['senha'])) {
  $codigo = $_POST['codigo'];
  $password = $_POST['senha'];
   
  $password = md5($password);
  $stmt = $connection->prepare("SELECT * FROM `administradores` WHERE codigo = ? AND senha = ?");
  $stmt->bindParam(1, $codigo);
  $stmt->bindParam(2, $password);

  if($stmt->execute() === TRUE) {

    if($stmt->rowCount() > 0) {

      $_SESSION['codigo'] = $codigo;
      $_SESSION['senha'] = $password;
      $_SESSION['administrador_logado'] = true;
      error_reporting(0);
       
      echo "<script>alert('Sucesso!'); window.location.href='index.php';</script>";
     
    } else {
     echo "<script>alert('Credenciais invalidas');</script>";
    }

  } else {
    echo "<script>alert('Erro no Servidor');</script>";
  }
}


?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administradores - Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Iniciar Sessão - Administrador</h3>
                <form action="./login.php" method="POST">
                  <div class="form-group">
                    <label>Codigo do entregador:</label>
                    <input type="number" style="color:white;" class="form-control p_input" name="codigo" required>
                  </div>
                  <div class="form-group">
                    <label>Senha:</label>
                    <input style="color: white;" type="password" name="senha" class="form-control p_input" required>
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                 
                 
                </form>
                
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>