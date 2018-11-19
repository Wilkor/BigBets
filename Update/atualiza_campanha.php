<?php

require_once("../config/config.php");

session_start();

$id=$_REQUEST["idbet"];

if(empty($id)){

 echo "<script>alert('');location.href='/Bigbets/';</script>";


}else{


$projetos_tbl_user = $conn->prepare("select idCamp,nameCamp,descCamp,status from campanhas where idCamp=".$id);
$projetos_tbl_user->execute();
$result=$projetos_tbl_user->fetch(PDO::FETCH_ASSOC);



$data  = array('bigId' =>$result['idCamp'],'bigbet'=>$result['nameCamp'],'descricao'=>$result['descCamp'],'status'=>$result['status']); 


$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;





 //echo "<script>location.href='/Bigbets/home/#contact';</script>";


}

?>