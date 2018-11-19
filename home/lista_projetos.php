<?php

session_start();
require_once("../config/config.php");


@$campanha = $_REQUEST['camp'];

@$bigid =  $_REQUEST['bigid'];



if($campanha=="Todos" || $campanha=="Selecione"){

 $where=" b.status='s'  and cam.status='s' ORDER BY valor desc";

}else if(@$bigid){


 $where=" b.status='s'  and cam.status='s' and b.bigid='".@$bigid."' ORDER BY valor desc"; 


}else{

 $where="b.status='s'  and cam.status='s' and b.campanha=".$campanha." ORDER BY valor desc";

}


$projetos = $conn->prepare("select b.bigId,b.bigId,b.bigbet,
  b.descricao,b.dtCadastro,b.estagio,b.equipe,b.biglike - deslike As valor,
  b.biglike,b.deslike,b.bigresp,es.estagioname as estagio, b.status,b.padrinho,b.userId,b.share,cam.nameCamp,u.area from bets b 
  inner join estagio es on b.estagio = es.idesta 
  inner join campanhas cam on b.campanha = cam.idCamp
  left join user u on b.userId = u.userId

  where ".$where);


$projetos->execute();




while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){

  if(@$result_projeto[share]==0 || @$result_projeto[share]==""){

    @$result_projeto[share]=1;
  }


  $data[]= array(

    'bigId' =>    @$result_projeto[bigId],
    'bigbet'=>    @$result_projeto[bigbet],
    'descricao'=> @$result_projeto[descricao],
    'estagio'=>   @$result_projeto[nameCamp].' - '.@$result_projeto[estagio],

    'biglike'=>   @$result_projeto[biglike],
    'bigresp'=>   @$result_projeto[bigresp],
    'padrinho'=>  @$result_projeto[padrinho],
    'share'=>  @$result_projeto[share],
    'area'=>  @$result_projeto[area]

  ); 

}




unset($_SESSION['bigid']);

$clientes = $data;     
$json =  json_encode($clientes, JSON_UNESCAPED_UNICODE);
echo $json; 








?>
