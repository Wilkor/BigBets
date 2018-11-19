<?php
require_once("../config/config.php");



date_default_timezone_set('America/Sao_Paulo');

$now = date('y-m-d H-i-s');

$dtime =$now;

$iduser=           $_GET["iduser"];
$idbet=            $_GET["idbet"];



if(empty($iduser)){

 //echo "<script>alert('Não chegou aqui');location.href='/bigbets/home/';</script>";


}else{
      
    


       $insert = $conn->prepare("insert into  cadastro(iduser,idbet,cddt) values(:iduser,:idbet,:cddt)");

       $insert->bindParam(":iduser",$iduser,  PDO::PARAM_STR);
       $insert->bindParam(":idbet", $idbet,   PDO::PARAM_STR);
       $insert->bindParam(":cddt",  $dtime,   PDO::PARAM_STR);
       $insert->execute();
    
       //echo "<script>alert('Inscrito com sucesso');location.href='/bigbets/home/';</script>";


 
$data  = array('registrado' =>'OK'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;


}


?>



