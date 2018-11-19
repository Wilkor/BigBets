<?php

require_once("../config/config.php");

session_start();

$id=$_REQUEST["idbet"];

if(empty($id)){

 echo "<script>alert('');location.href='/Bigbets/';</script>";


}else{


$projetos_tbl_user = $conn->prepare("select bigId,bigbet,descricao,status,estagio,publico,problema,cboproposta,solucao,resultesp,equipe from bets where  bigId=".$id);
$projetos_tbl_user->execute();
$result=$projetos_tbl_user->fetch(PDO::FETCH_ASSOC);



$data  = array('bigId' =>$result['bigId'],'bigbet'=>$result['bigbet'],'descricao'=>$result['descricao'],'status'=>$result['status'],'estagio'=>$result['estagio'],'publico'=>$result['publico'],'problema'=>$result['problema'],'cboproposta'=>$result['cboproposta'],'solucao'=>$result['solucao'],'resultesp'=>$result['resultesp'],'equipe'=>$result['equipe']); 


$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;





 //echo "<script>location.href='/Bigbets/home/#contact';</script>";


}

?>