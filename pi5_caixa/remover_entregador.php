<?php

include 'dbCon.php';

 $stmt = $connection->prepare("DELETE FROM entregadores WHERE codigo = ?");
 $codigo = $_GET['codigo'];
 $stmt->bindParam(1, $codigo);
 $stmt->execute();
 
 echo "<script>alert('Removido!'); window.location.href='lista_entregadores.php';</script>";