<?php 

require_once("../config/config.php");


session_start();

$status="Of";

$sql = "update user set status= :status where sigla = :sigla";
$stmt = $conn->prepare($sql);                                  
$stmt->bindParam(':status', $status, PDO::PARAM_STR); 
$stmt->bindParam(':sigla', $_SESSION['sigla'], PDO::PARAM_STR);     

$stmt->execute(); 

echo "<script>location.href='/Bigbets/acesso/';</script>";




session_destroy();


?>



