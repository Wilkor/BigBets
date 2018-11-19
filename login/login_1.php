<?php

require_once("../config/config.php");

session_start();


$sigla=strtolower(preg_replace('/[^[:alnum:]_]/', '',$_REQUEST["sigla"]));
$senha=base64_encode ($_REQUEST["senha"]);


$consulta = $conn->prepare("select userId,nome,sigla,user_id_pipe,tipo from user where sigla= '$sigla' and senha='$senha'"  );

	$consulta->execute();

       $result=$consulta->fetch(PDO::FETCH_ASSOC);
		 
	

       if (@$result[sigla]==$sigla){


$_SESSION["nick"]=@$result[nome];

$_SESSION["iduser"]=@$result[userId];

$_SESSION["sigla"]=@$result[sigla];

$_SESSION["pipe"]=@$result[user_id_pipe];

$_SESSION["tipo"]=@$result[tipo];



if(@$result[sigla]=="T705780" || @$result[sigla]=="t705780" || @$result[sigla]=="705780" ){

//echo "<script>location.href='/Bigbets/Aprovador/home/';</script>";
$data  = array('login' =>'OK','msg'=>'ande'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;

}else{

//echo "<script>location.href='/Bigbets/Home/';</script>";
$data  = array('login' =>'OK'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;

}
      }else{


//echo "<script>alert('Usuario ou Senha invalidos');location.href='/Bigbets/';</script>";

$data  = array('login' =>'no','msg'=>'Usuário ou Senha inválidos'); 
$json = json_encode($data);
echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;

       }




?>


