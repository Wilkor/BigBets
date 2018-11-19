<?php

session_start();
require_once("../config/config.php");



$projetos = $conn->prepare("select idCamp as id, nameCamp as nome, descCamp from Campanhas  where status='s' and idCamp='".$_REQUEST['id']."'");


$projetos->execute();




while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){

  $data= array(

                    'desc' =>    @$result_projeto[descCamp],
                
                                    
                  ); 

}



                     
                 $json =  json_encode($data, JSON_UNESCAPED_UNICODE);
                 echo $json; 




?>

