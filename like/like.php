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



if($opc==1){


$projetos1 = $conn->prepare("select biglike from biglike where idbet='".$id."' and iduser=".$user);
$projetos1->execute();

while($result_projeto1=$projetos1->fetch(PDO::FETCH_ASSOC)){;
    $result_likes =$result_projeto1['biglike'];
}


if(@$result_likes==""){

$projetos = $conn->prepare("select biglike from bets where bigId=".$id);
$projetos->execute();

while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){;
    $result_like =$result_projeto['biglike']+1;
}


$sql = "update bets set biglike = :nota where bigId = :bigId";
$stmt = $conn->prepare($sql);                                  
$stmt->bindParam(':nota',$result_like, PDO::PARAM_STR);       
$stmt->bindParam(':bigId', $id, PDO::PARAM_STR);   
$stmt->execute(); 


$projetos = $conn->prepare("select biglike,bigresp from bets where bigId=".$id);
$projetos->execute();
$result_projeto=$projetos->fetch(PDO::FETCH_ASSOC);



$insert = $conn->prepare("insert into biglike(iduser,idbet,biglike) values(:iduser,:idbet,:biglike)");


      $insert->bindParam(":iduser", $user,  PDO::PARAM_STR);
      $insert->bindParam(":idbet",  $id,   PDO::PARAM_STR);
      $insert->bindParam(":biglike", $like,  PDO::PARAM_STR);
      $insert->execute();



$data  = array('biglike' =>$result_projeto,'bigId'=>$id,'like'=>'like','resp'=>$result_projeto['bigresp']); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;




}else{

$data  = array('biglike' =>'cur'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;


}



}else{


$projetos = $conn->prepare("select deslike from bets where bigId=".$id);
$projetos->execute();

while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){;
    $result_deslike =$result_projeto['deslike']+1;
}



$sql = "update bets set deslike = :nota where bigId = :bigId";
$stmt = $conn->prepare($sql);                                  
$stmt->bindParam(':nota',$result_deslike, PDO::PARAM_STR);       
$stmt->bindParam(':bigId', $id, PDO::PARAM_STR);   
$stmt->execute(); 


$projetos = $conn->prepare("select deslike from bets where bigId=".$id);
$projetos->execute();
$result_projeto=$projetos->fetch(PDO::FETCH_ASSOC);

$data  = array('deslike' =>$result_projeto,'bigId'=>$id,'des'=>'des'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;



}

?>