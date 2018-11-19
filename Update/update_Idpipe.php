<?php

require_once("../config/config.php");

session_start();

$id=$_REQUEST["idbet"];
$st=$_REQUEST["id_pipe"];

$now = date('y-m-d H-i-s');

$dtime =$now;



if(empty($id)){

 echo "<script>alert('');location.href='/Bigbets/';</script>";


}else{


$sql = "update bets set id_big_pipe = :id_pipe where bigId = :bigId";
$stmt = $conn->prepare($sql);                                  
$stmt->bindParam(':id_pipe', $st, PDO::PARAM_STR);       
$stmt->bindParam(':bigId', $id, PDO::PARAM_STR);   
$stmt->execute(); 


$data  = array('update' =>'OK'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;



}


?>