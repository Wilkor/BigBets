<?php

require_once("../../config/config.php");

session_start();

$id=$_REQUEST["idbet"];
$statusN=$_REQUEST["statusN"];


$now = date('y-m-d H-i-s');

$dtime =$now;



if(empty($id)){

 echo "<script>alert('');location.href='/Bigbets/';</script>";


}else{


$sql2 = "update bets set status = :statusN where bigId = :bigId";
$stmt2= $conn->prepare($sql2);                                  
$stmt2->bindParam(':statusN',$statusN, PDO::PARAM_STR);         
$stmt2->bindParam(':bigId', $id, PDO::PARAM_STR);   
$stmt2->execute(); 


$data  = array('update' =>'OK'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;


}



?>