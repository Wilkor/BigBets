<?php
require_once("../config/config.php");
session_start();

date_default_timezone_set('America/Sao_Paulo');

$now = date('y-m-d H-i-s');

$dtime =$now;

$nomepi=           $_POST["txtnomeprojeto"];
$descricao=        $_POST["txtdescricao"];
$solucao=          $_POST["txtsolucao"];
$problema=         $_POST["txtproblema"];
$publico=          $_POST["txtpublicoalvo"];
$equipe=           $_POST["txtequipe"];
$cboproposta=      "Projeto";
$cboestagio=       $_POST["cboestagio"];
$resultesp=        $_POST["resultesp"];
$userId=           $_POST["txtuserId"];
$campanha=         $_POST["cbocampanha"];
$status=           "s";
$statusP=          "n";
$sigla=            $_SESSION["sigla"];


if($_SESSION['tipo']=="u"){

 $cboestagio="2";

}


if(empty($nomepi)){

 echo "<script>alert('Não chegou aqui');location.href='/bigbets/home/';</script>";


}else{
      
     $insert = $conn->prepare("insert into  bets(bigbet,descricao,solucao,problema,publico,equipe,cboproposta,estagio,status,dtCadastro,resultesp,bigresp,statusP,userId,campanha) 
                 values(:bigbet,:descricao,:solucao,:problema,:publico,:equipe,:proposta,:estagio,:status,:data,:resultesp,:bigresp,:statusP,:userId, :campanha)");

       $insert->bindParam(":bigbet",    $nomepi,PDO::PARAM_STR);
       $insert->bindParam(":descricao", $descricao,PDO::PARAM_STR);
       $insert->bindParam(":solucao",   $solucao,PDO::PARAM_STR);
       $insert->bindParam(":problema",  $problema,PDO::PARAM_STR);
       $insert->bindParam(":publico",   $publico,PDO::PARAM_STR);
       $insert->bindParam(":equipe",    $equipe,PDO::PARAM_STR);
       $insert->bindParam(":proposta",  $cboproposta,PDO::PARAM_STR);
       $insert->bindParam(":bigresp",   $sigla,PDO::PARAM_STR);
       $insert->bindParam(":estagio",   $cboestagio,PDO::PARAM_STR);
       $insert->bindParam(":status",    $status,PDO::PARAM_STR);
       $insert->bindParam(":data",      $dtime,PDO::PARAM_STR); 
       $insert->bindParam(":resultesp", $resultesp, PDO::PARAM_STR);
       $insert->bindParam(":statusP",   $statusP, PDO::PARAM_STR);
       $insert->bindParam(":userId",    $userId, PDO::PARAM_STR);
       $insert->bindParam(":campanha",  $campanha, PDO::PARAM_STR);
       $insert->execute();
     

       $consult = $conn->prepare("select b.bigId as id,b.estagio as estag,u.userId,b.dtCadastro as cadastro from bets b 
                                  inner join bigbets.user u on b.bigresp = u.sigla 
                                  where bigresp='$sigla'order by dtCadastro desc limit 1");

        $consult->execute();



      while($result_consult=$consult->fetch(PDO::FETCH_ASSOC)){

          $insert_log = $conn->prepare("insert into loguser(idbigbet,estag,userId,dtultalteracao,dtfinal) 
          values(:idbigbet,:estag,:userId,:dtultalteracao,:dtfinal)");

          $insert_log->bindParam(":idbigbet",$result_consult['id'],PDO::PARAM_STR);
          $insert_log->bindParam(":estag",$result_consult['estag'],PDO::PARAM_STR);
          $insert_log->bindParam(":userId",$userId,PDO::PARAM_STR);
          $insert_log->bindParam(":dtultalteracao",$result_consult['cadastro'],PDO::PARAM_STR);
          $insert_log->bindParam(":dtfinal",$result_consult['cadastro'],PDO::PARAM_STR);
          $insert_log->execute();

       

      }


       echo "<script>alert('Cadastro efetuado com sucesso!');</script>";
       echo "<script>location.href='/bigbets/home/';</script>";



}

?>