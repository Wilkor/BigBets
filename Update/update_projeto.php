<?php

require_once("../config/config.php");

session_start();

$id=$_REQUEST["idbet"];
$estagio=$_REQUEST["cboestagio"];
$name_projeto=$_REQUEST["txtnomeprojeto"];
$desc=$_REQUEST["txtdescricao"];
$solucao=$_REQUEST["txtsolucao"];
$problema=$_REQUEST["txtproblema"];
$publico_alvo=$_REQUEST["txtpublicoalvo"];
$equipe=$_REQUEST["txtequipe"];
$resultesp=$_REQUEST["resultesp"];
$userId = $_REQUEST["txtuserId"];
$userIdPad = $_SESSION['iduser'];

date_default_timezone_set('America/Sao_Paulo');
$now = date('y-m-d H-i-s');

$dtime =$now;



if(empty($id)){

	echo "<script>alert('');location.href='/Bigbets/';</script>";


}else{


	$sql = "update bets set descricao = :descricao,estagio = :estagio,publico = :publico,problema = :problema,equipe = :equipe,solucao=:solucao,resultesp=:resultesp,dtUlt=:dtUlt where bigId = :bigId";

	$stmt = $conn->prepare($sql);                                  
	$stmt->bindParam(':descricao', $desc, PDO::PARAM_STR); 
	$stmt->bindParam(':estagio', $estagio, PDO::PARAM_STR);     
	$stmt->bindParam(':publico', $publico_alvo, PDO::PARAM_STR);     
	$stmt->bindParam(':problema', $problema, PDO::PARAM_STR);     
	$stmt->bindParam(':equipe', $equipe, PDO::PARAM_STR);     
	$stmt->bindParam(':solucao', $solucao, PDO::PARAM_STR);     
	$stmt->bindParam(':resultesp', $resultesp, PDO::PARAM_STR);  
	$stmt->bindParam(':dtUlt', $dtime, PDO::PARAM_STR);  
	$stmt->bindParam(':bigId', $id, PDO::PARAM_STR);   
	$stmt->execute(); 




	$insert = $conn->prepare("insert into loguser(idbigbet,estag,userId,dtultalteracao,dtfinal,userIdPad)
		values(:idbigbet,:estag,:userId,:dtultalteracao,:dtfinal,:userIdPad)");

	$insert->bindParam(":idbigbet",$id,PDO::PARAM_STR);
	$insert->bindParam(":estag",$estagio,PDO::PARAM_STR);
	$insert->bindParam(":userId",$userId,PDO::PARAM_STR);
	$insert->bindParam(":dtultalteracao",$dtime,PDO::PARAM_STR);
	$insert->bindParam(":dtfinal",$dtime,PDO::PARAM_STR);
	$insert->bindParam(":userIdPad",$userIdPad,PDO::PARAM_STR);

	$insert->execute();


	if($estagio==10){


    $status_loguser="n";
    $status_bet="n";

     $sql1 = "update loguser set status = :status_loguser where idbigbet = :bigId";

	$stmt1 = $conn->prepare($sql1);                                  
	$stmt1->bindParam(':status_loguser',$status_loguser, PDO::PARAM_STR); 
	$stmt1->bindParam(':bigId',$id, PDO::PARAM_STR);   
	$stmt1->execute(); 

    $sql2 = "update bets set status = :status_bet where bigId = :bigId";

	$stmt2 = $conn->prepare($sql2);                                  
	$stmt2->bindParam(':status_bet',$status_bet, PDO::PARAM_STR); 
	$stmt2->bindParam(':bigId', $id, PDO::PARAM_STR);   
	$stmt2->execute(); 


	}



	$sql_penult = $conn->prepare("select loguserId from loguser where dtultalteracao < (select max(dtultalteracao) from loguser) and idbigbet ='".$id."'order by dtultalteracao desc limit 1");

	$sql_penult->execute(); 

	while($result_penult=$sql_penult->fetch(PDO::FETCH_ASSOC)){


		$sql_up = "update loguser set dtfinal = :dtfinal, userIdPad=:userIdPad where loguserId = :Id ";

		$stmt_updata = $conn->prepare($sql_up);  
		$stmt_updata->bindParam(':dtfinal', $dtime, PDO::PARAM_STR); 
		$stmt_updata->bindParam(':Id',$result_penult['loguserId'], PDO::PARAM_STR);
		$stmt_updata->bindParam(':userIdPad',$userIdPad, PDO::PARAM_STR); 
		$stmt_updata->execute(); 


	}



	echo "<script>alert('Atualizado com Sucesso');location.href='/Bigbets/home/index.php';</script>";


}

?>