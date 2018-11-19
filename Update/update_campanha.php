<?php

require_once("../config/config.php");

session_start();

$id=$_REQUEST["idbet"];
$estagio=$_REQUEST["cboestagio"];
$name_projeto=$_REQUEST["txtnomeprojeto"];
$desc=$_REQUEST["txtdescricao"];



date_default_timezone_set('America/Sao_Paulo');
$now = date('y-m-d H-i-s');

$dtime =$now;



if(empty($id)){

 echo "<script>alert('');location.href='/Bigbets/';</script>";


}else{


$sql = "update campanhas set descCamp = :descricao, status = :status,nameCamp= :nameCamp where idCamp = :bigId";

$stmt = $conn->prepare($sql);                                  
$stmt->bindParam(':descricao', $desc, PDO::PARAM_STR); 
$stmt->bindParam(':status', $estagio, PDO::PARAM_STR);     
$stmt->bindParam(':nameCamp', $name_projeto, PDO::PARAM_STR);
$stmt->bindParam(':bigId', $id, PDO::PARAM_STR);  
$stmt->execute(); 



echo "<script>alert('Atualizado com Sucesso');location.href='/Bigbets/Iniciativas/index.php';</script>";


}

?>