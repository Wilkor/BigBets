<?php

require_once("../config/config.php");

session_start();

$id=$_REQUEST["idbet"];
$padrinho=$_REQUEST["padrinho"];
$statusP=$_REQUEST["statusP"];
$id1=$_REQUEST["idbet"];
$padrinho1=$_REQUEST["padrinho"];

$now = date('y-m-d H-i-s');

$dtime =$now;



if(empty($id)){

 echo "<script>alert('');location.href='/Bigbets/';</script>";


}else{



$sql = "update bets set padrinho = :padrinho,statusP = :statusP  where bigId = :bigId";
$stmt = $conn->prepare($sql);                                  
$stmt->bindParam(':padrinho',$padrinho, PDO::PARAM_STR);
$stmt->bindParam(':statusP',$statusP, PDO::PARAM_STR);         
$stmt->bindParam(':bigId', $id, PDO::PARAM_STR);   
$stmt->execute(); 


$sql1 = "update loguser set userIdPad = :padrinho1 where idbigbet = :bigId1";
$stmt1 = $conn->prepare($sql1);

$stmt1->bindParam(':padrinho1',$padrinho1, PDO::PARAM_STR);
$stmt1->bindParam(':bigId1', $id1, PDO::PARAM_STR);   
$stmt1->execute(); 

$data  = array('update' =>'OK'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;







}



?>