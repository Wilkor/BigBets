<?php

require_once("config/config.php");


$api_key = $_REQUEST['api_key'];




if($api_key=="Y2hhdmViaWdiZXRzMjAxNg=="){


  try{
  $projetos_tbl_user = $conn->prepare($_REQUEST['query']);
  $projetos_tbl_user->execute();


 if($_REQUEST['user']=="user"){
   
      while($result_projeto_user=$projetos_tbl_user->fetch(PDO::FETCH_ASSOC)){
   
      $data[]= array(

     'sigla' =>    @$result_projeto_user[sigla],
     'nome'=>    @$result_projeto_user[nome],
     'userId'=>    @$result_projeto_user[userId],
     'psw'=>    @$result_projeto_user[senha]
   

  ); 
        
        
        }
   
   }else{
  $data  = array('retorno' =>'OK'); 

}
    
    
  $json = json_encode($data);
  echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;



  }catch (Exception $err )

    {
       echo $_GET['callback'] . '(' . json_encode("Exception: ". $err->getMessage()) . ')'; 
    }


}else{


  $data  = array('Erro' =>'500'); 


  $json = json_encode($data);
  echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;

}






?>