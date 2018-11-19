<?php

require_once("../config/config.php");
session_start();


date_default_timezone_set('America/Sao_Paulo');

$now = date('y-m-d H-i-s');

$dtime =$now;

$nome=$_REQUEST["nome"];
$sigla=strtolower($_REQUEST["sigla"]);
$senha=base64_encode ($_REQUEST["senha"]);
$area=$_REQUEST["dep"];
$salaryGroupLevel=$_REQUEST["salaryGroupLevel"];
$managerId=$_REQUEST["managerId"];
$mail=$_REQUEST["mail"];

$status="On";


if($salaryGroupLevel<200){

$tipo="u";

}else if($salaryGroupLevel=>200 &&  $salaryGroupLevel<=500){

$tipo="p";


}else if($salaryGroupLevel>500){

$tipo="a";

}



$_SESSION["nick"]=$nome;
$_SESSION['sigla']=$sigla;

if(empty($nome)){

      echo "<script>alert('');location.href='/Bigbets/acesso';</script>";


}else{


      $projetos_tbl_user = $conn->prepare("select sigla from user where sigla='".$sigla."'");
      $projetos_tbl_user->execute();
      $result_select_user = $projetos_tbl_user->rowCount();

      if($result_select_user==1){


      // echo "<script>alert('Você já possui acesso ao sistema');location.href='/Bigbets/';</script>";

            $data  = array('registro' =>'no','msg'=>'Você já possui cadastro!'); 
            $json = json_encode($data);
            echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;


      }else{

            $insert = $conn->prepare("insert into user(sigla,nome,senha,userdtCadastro,status,tipo,area,salaryGroupLevel,managerId,mail)
                  values(:sigla,:nome,:senha,:data,:status,:tipo,:area,:salaryGroupLevel,:managerId,:mail)");


            $insert->bindParam(":sigla",  $sigla,   PDO::PARAM_STR);
            $insert->bindParam(":nome",   $nome,    PDO::PARAM_STR);
            $insert->bindParam(":senha",  $senha,   PDO::PARAM_STR);
            $insert->bindParam(":data",   $dtime,   PDO::PARAM_STR);
            $insert->bindParam(":status", $status,  PDO::PARAM_STR);
            $insert->bindParam(":tipo",   $tipo,    PDO::PARAM_STR);
            $insert->bindParam(":area",   $area,    PDO::PARAM_STR);
            $insert->bindParam(":salaryGroupLevel",   $salaryGroupLevel,    PDO::PARAM_STR);
            $insert->bindParam(":managerId",   $managerId,    PDO::PARAM_STR);
            $insert->bindParam(":mail",   $mail,    PDO::PARAM_STR);
            $insert->execute();

            $consulta = $conn->prepare("select userId,sigla,tipo,nome from user where sigla='".$sigla."'");

            $consulta->execute();

            $result=$consulta->fetch(PDO::FETCH_ASSOC);



            $_SESSION["nick"]=@$result[nome];

            $_SESSION["iduser"]=@$result[userId];

            $_SESSION["sigla"]=@$result[sigla];

            $_SESSION["tipo"]=@$result[tipo];

      //echo "<script>alert('Registrado com Sucesso');location.href='/Bigbets/Home';</script>";

            $data  = array('registro' =>'OK','msg'=>'Cadastro efetivado com Sucesso!'); 
            $json = json_encode($data);
            echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;


      }



}

?>