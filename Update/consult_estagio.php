<?php

require_once("../config/config.php");

session_start();

$id=$_REQUEST["idbet"];

if(empty($id)){

 echo "<script>alert('');location.href='/Bigbets/';</script>";


}else{


$projetos_tbl_user = $conn->prepare("select idesta,estagioname,status from estagio where idesta=".$id);
$projetos_tbl_user->execute();
$result=$projetos_tbl_user->fetch(PDO::FETCH_ASSOC);



$data  = array('bigId' =>$result['idesta'],'bigbet'=>$result['estagioname'],'status'=>$result['status']); 


$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;





 //echo "<script>location.href='/Bigbets/home/#contact';</script>";


}

?>