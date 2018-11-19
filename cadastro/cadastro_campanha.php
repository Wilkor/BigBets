<?php
require_once("../config/config.php");
session_start();

date_default_timezone_set('America/Sao_Paulo');

$now = date('y-m-d H-i-s');

$dtime =$now;

$nomepi=           $_POST["txtnomeprojeto"];
$descricao=        $_POST["txtdescricao"];
$status=          $_POST["cboestagio"];
$sigla=$_SESSION["sigla"];


if(empty($nomepi)){

 echo "<script>alert('Não chegou aqui');location.href='/bigbets/home/';</script>";


}else{
      
     $insert = $conn->prepare("insert into  campanhas(nameCamp,descCamp,status,useCamp) 
                               values(:nameCamp,:descCamp,:status,:useCamp)");

       $insert->bindParam(":nameCamp",  $nomepi,PDO::PARAM_STR);
       $insert->bindParam(":descCamp",  $descricao,PDO::PARAM_STR);
       $insert->bindParam(":status",    $status,PDO::PARAM_STR);
       $insert->bindParam(":useCamp",   $sigla, PDO::PARAM_STR);

       $insert->execute();
     


       echo "<script>alert('Cadastro efetuado com sucesso!');</script>";
       echo "<script>location.href='/bigbets/home/';</script>";



}

?>