<?php
error_reporting(E_ALL);

    require_once("../config/config.php");

  session_start();


  $sigla=strtolower($_REQUEST["sigla"]);


  $consulta = $conn->prepare("select userId,nome,sigla,user_id_pipe,tipo,tipo,area,mail,managerId from user where sigla= '$sigla' "  );
  $consulta->execute();
  $result=$consulta->fetch(PDO::FETCH_ASSOC);


    if($result>0){


    $data  = array('nome' =>$result['nome'],'tipo'=>$result['tipo'],'userId'=>$result['userId'],'mail'=>$result['mail'],'dep'=>$result['area'],'managerId'=>$result['managerId']); 
  $json = json_encode($data);
  echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;



    }else{


    $data  = array('erro' =>'erro'); 
  $json = json_encode($data);
  echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;


    }

  


?>


