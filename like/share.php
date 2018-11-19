<?php

require_once("../config/config.php");

session_start();

$id=$_REQUEST["idbet"];
$like=$_REQUEST["l"];
$deslike=$_REQUEST["l"];
$opc=$_REQUEST["opc"];
$user=$_REQUEST["user"];
$now = date('y-m-d H-i-s');
$dtime =$now;



$projetos1 = $conn->prepare("select share from bets where bigId=".$id);
$projetos1->execute();

while($result_projeto1=$projetos1->fetch(PDO::FETCH_ASSOC)){
    $result_like1 =$result_projeto1['share']+1;


$sql = "update bets set share = :nota where bigId = :bigId";
$stmt = $conn->prepare($sql);                                  
$stmt->bindParam(':nota',$result_like1, PDO::PARAM_STR);       
$stmt->bindParam(':bigId', $id, PDO::PARAM_STR);   
$stmt->execute(); 


$projetos2 = $conn->prepare("select share,bigresp from bets where bigId=".$id);
$projetos2->execute();
$result_projeto2=$projetos2->fetch(PDO::FETCH_ASSOC);


$insert = $conn->prepare("insert into share(iduser,idbet,share) values(:iduser,:idbet,:share)");


      $insert->bindParam(":iduser", $user,  PDO::PARAM_STR);
      $insert->bindParam(":idbet",  $id,   PDO::PARAM_STR);
      $insert->bindParam(":share", $like,  PDO::PARAM_STR);
      $insert->execute();




}




$data  = array('biglike' =>$result_projeto2,'bigId'=>$id,'like'=>'like','resp'=>$result_projeto2['bigresp']); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;



?>