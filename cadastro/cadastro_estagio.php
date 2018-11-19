<?php
require_once("../config/config.php");
session_start();

date_default_timezone_set('America/Sao_Paulo');

$now = date('y-m-d H-i-s');

$dtime =$now;

$nomepi=           $_POST["txtnomeprojeto"];
$status=           $_POST["cboestagio"];



if(empty($nomepi)){

 echo "<script>alert('Não chegou aqui');location.href='/bigbets/home/';</script>";


}else{
      
     $insert = $conn->prepare("insert into  estagio(estagioname,status) 
                               values(:nameCamp,:status)");

       $insert->bindParam(":nameCamp",  $nomepi,PDO::PARAM_STR);
       $insert->bindParam(":status",    $status,PDO::PARAM_STR);
      

       $insert->execute();
     


       echo "<script>alert('Cadastro efetuado com sucesso!');</script>";
       echo "<script>location.href='/bigbets/Estagio/';</script>";



}

?>