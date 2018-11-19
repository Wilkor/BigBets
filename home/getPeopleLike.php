<?php

session_start();
require_once("../config/config.php");



$projetos = $conn->prepare("SELECT u.nome,u.area,u.status FROM user u inner join biglike bl on u.userid = bl.iduser WHERE bl.idbet='".$_REQUEST['id']."' order by status desc");


$projetos->execute();

$tamanho= $projetos->rowCount();  


while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){

  $data[]= array(

    'nome' =>    @$result_projeto[nome],
    'area' =>    @$result_projeto[area],
    'status' =>    @$result_projeto[status]


  ); 

}



$clientes = $data;     
$json =  json_encode($clientes, JSON_UNESCAPED_UNICODE);      

echo $json; 




?>

