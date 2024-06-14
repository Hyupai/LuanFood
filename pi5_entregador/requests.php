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
  
  $data = json_decode(file_get_contents("php://input"));
    if(isset($data->request)) {
        $request = $data->request;
    } else {
        $request = "";
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

  
 
?>