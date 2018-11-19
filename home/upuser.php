<?php

    require_once("../config/config.php");

  session_start();


    $sigla=$_REQUEST["iduser_id"];
    $tipo=$_REQUEST["cboTipo"];
    $managerId=$_REQUEST["managerId"];


   //print_r($_REQUEST);

   // die();



$sql = "update user set tipo = :tipo, managerId = :managerId where userId = :userId";
$stmt = $conn->prepare($sql);  

$stmt->bindParam(':tipo',$tipo, PDO::PARAM_STR);
$stmt->bindParam(':managerId',$managerId, PDO::PARAM_STR);           
$stmt->bindParam(':userId',$sigla, PDO::PARAM_STR);   
$stmt->execute(); 



       echo "<script>alert('Atualizado com sucesso!');</script>";
       echo "<script>location.href='/bigbets/home/';</script>";



?>
