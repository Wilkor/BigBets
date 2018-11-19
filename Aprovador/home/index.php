<?php

session_start();
require_once("../../config/config.php");




$tipo_user = $_SESSION["tipo"];

echo "<script> alert(".$tipo_user.");</script>";


$name_nick = $_SESSION["nick"];
$frist_name = explode(" ", $name_nick);




@$filter_grafic= $_REQUEST['cbofiltro'];


if(empty($filter_grafic) || $filter_grafic=="Todos" || $filter_grafic=="Selecione"){

  $filter_grafic=0;


}


if($tipo_user=="u"){


  if($filter_grafic===0){

    $where=" bet.status='s' and bet.bigresp='".$sigla."'";
    $where1=" bet.status='s' and bet.bigresp='".$sigla."'";

  }else{


   $where=" bet.status='s' and bet.bigresp='".$sigla."'  and camp.idCamp=".$filter_grafic;
   $where1=" bet.status='s' and bet.bigresp='".$sigla."' and camp.idCamp=".$filter_grafic;


 }




}else if($tipo_user=="p"){


  if($filter_grafic===0){

    $where  =" bet.status='s'  and bet.padrinho=".$iduser;

    $where1 =" bet.status='s' and bet.padrinho=".$iduser;

  }else{


    $where  =" bet.status='s'  and camp.idCamp=".$filter_grafic." and padrinho=".$iduser;

    $where1 =" bet.status='s'  and camp.idCamp=".$filter_grafic." and bet.padrinho=".$iduser;

  }




}else{


  if($filter_grafic===0){

   $where=" bet.status='s' and camp.status='s' ";
   $where1=" bet.status='s' and camp.status='s' ";


 }else{

  $where=" bet.status='s' and camp.status='s' and camp.idCamp=".$filter_grafic;
  $where1=" bet.status='s' and camp.status='s' and camp.idCamp=".$filter_grafic;

}



}




if (empty($_SESSION["nick"])){

echo "<script>location.href='/Bigbets/';</script>";

}

//INNER JOIN cadastro ON idbet = bigId
  



   $projetos = $conn->prepare("select bet.bigId,bet.bigId,bet.bigbet,
    bet.descricao,bet.dtCadastro,bet.estagio,bet.equipe,bet.biglike - deslike As valor,
    bet.biglike,bet.deslike,bet.bigresp,es.estagioname as estagio, bet.status from bets bet 
    inner join estagio es on bet.estagio = es.idesta 
    inner join Campanhas camp on camp.idCamp = bet.campanha
    where ".$where." ORDER BY valor desc");
    $projetos->execute();


?>



<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Big Bets</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/select.css" rel="stylesheet">
    <link href="https://www.santander.com.br/Theme_WCSantanderUK-theme/images/favicon.ico" rel="Shortcut Icon" />
    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/tiktok.css" rel="stylesheet">
     

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />


<style>
table {
  width:100%;
  
}


#th {
  
  height:10px;
  padding-left:4px;
  padding-right:2px;
  font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 0.9em;
  color:white;
  border-radius:2px
  width:150px;
text-align: center;
  }

#td {

  height:120px;
  width:200px;
  padding-top: 0px;
  font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 0.9em;
  color:black;
   text-align: center;

  }

  #btn{
    background-color:#1bb3bc; /* Green */
    border: none;
    color: white;
    padding:10px 15px;
    text-align:left;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius:30px 30px
}
  #btn1{
    background-color:#1bb3bc; /* Green */
    border: none;
    color: white;
    padding:10px 15px;
    text-align:left;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius:30px 30px
}

</style>


</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">Home</a>
            </div>

        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                 
             
                  




                    <li class="page-scroll">
                        <a href="#portfolio">Projetos</a>
                    </li>

                        <li class="page-scroll">
                        <a href="/bigbets/Home/">Voltar</a>
                      </li>

                   

                      <li class="page-scroll">
                        <a href="/Bigbets/sair/sair.php">Sair</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/Bis-Bets-Roxo.png" alt="">
                    <div class="intro-text"><br><br>
                        <span style="font-family:Montserrat,'HelveticaNeue',Helvetica,Arial,sans-serif;text-transform:uppercase;font-weight:700;color:#662d91"><?php echo $frist_name[0];?>, o que a gente pode fazer juntos hoje?</span>
                       
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->

     


    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Projetos</h2>
                    <hr class="star-primary">
                </div>
            </div>
          <label>Campanhas</label>
           <form id="filter_grafic" action="index.php" method="post">
                  <select id="cbofiltro" name="cbofiltro" class="form-control" style="height:30px;margin-top:10px;" onchange="post();" required > 

                    <option value="Selecione">Selecione uma Campanha</option>
                    <option value="Todos">Todos</option>
                    <?php


                    $estagio = $conn->prepare("select idCamp as id, nameCamp as nome from Campanhas  where status='s' order by  id asc");
                    $estagio->execute();

                    while($result_estagio=$estagio->fetch(PDO::FETCH_ASSOC)){

                      echo "<option value=".$result_estagio['id'].">".utf8_encode($result_estagio['nome'])."</option>";


                    }

                    ?>


                  </select>

                </form>
                
         <div class="table-responsive">
               
                    <table class="table ls-tabl" id="tabela1">
                        <thead >
                            <tr>
                                <th class="hidden-xs text-center">ID</th>
                                <th class="hidden-xs text-center">Projeto</th>
                                <!--<th class="hidden-xs">Descrição</th>-->
                                <th class="hidden-xs text-center">Estágio</th>

                                <th class="hidden-xs text-center">Apadrinhar</th>
                                
                               <th class="hidden-xs text-center"></th>

                               <th class="hidden-xs text-center">Inativar Ideia</th>
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                        
<?php    
              

 while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){


  
@$projetos_user = $conn->prepare("select userId,nome from user where tipo='p' and managerId='".$_SESSION['sigla']."'");
@$projetos_user->execute();


                      echo  "<tr>";

                      echo  "<td class='hidden-xs text-center'>".@$result_projeto['bigId']."</td>";


                      echo  "<td class='hidden-xs text-center'><a data-toggle='modal' href='#myModal".@$result_projeto['bigId']."'  href=''>".@$result_projeto['bigbet']."</a></td>";

                      echo  "<td class='hidden-xs text-center'>".utf8_encode($result_projeto['estagio'])."</td>";


                     echo $result_projeto['estagio']!="BCO de Ideias"?"<td class='hidden-xs text-center'><select id='cbopadrinho' name='cbopadrinho' class='form-control' disabled>"
:"<td class='hidden-xs text-center'><select id='cbopadrinho' name='cbopadrinho' class='form-control' required >";

                      echo "<option value='selecione'>Selecione</option>";


                      while($result_projeto_user=$projetos_user->fetch(PDO::FETCH_ASSOC)){

                      echo "<option value=".$result_projeto_user['userId'].">".$result_projeto_user['nome']."</option>";

                      }
                      echo "</select>";
                      echo "</td>";



                 
                       echo $result_projeto['estagio']=="Apadrinhado"?"<td class='hidden-xs text-center'> <a href='#contact'> <button type='button' class='btn btn-primary' class='button' id='btn' data-bool='' onclick='updateStatus(".@$_SESSION['iduser'].",".@$result_projeto['bigId'].");' style='background:#662d91' ' disabled >Direcionar</button></a></td>":"<td class='hidden-xs text-center'> <a href='#contact'> <button type='button' class='btn btn-primary' class='button' id='btn' data-bool='' onclick='updateStatus(".@$_SESSION['iduser'].",".@$result_projeto['bigId'].");' style='background:#662d91' '>Direcionar</button></a></td>";


                    
 
                    echo $result_projeto['estagio']=="Apadrinhado"?" <td class='hidden-xs text-center'> <button type='button' class='btn btn-primary' class='button' id='btn' data-bool='' onclick='updateStatusInativar(".@$_SESSION['iduser'].",".@$result_projeto['bigId'].");' style='background:#662d91' ' disabled >Inativar</button></td>": "<td class='hidden-xs text-center'> <button type='button' class='btn btn-primary' class='button' id='btn' data-bool='' onclick='updateStatusInativar(".@$_SESSION['iduser'].",".@$result_projeto['bigId'].");' style='background:#662d91' '>Inativar</button></td>";







                      echo  "</tr>";

                      }



                           ?>

                            
                        </tbody>
                    </table>
                </div>

        </div>
    </section>

    <!-- About Section -->


    <!-- Contact Section -->
    
</form>

 



<!-- Modal -->

<?php 

$projetos = $conn->prepare("select bigId,bigbet,descricao,solucao,problema,publico,equipe,cboproposta,cboprojetoafetado,estagio,status,dtCadastro,resultesp,dpenvolvidos from bets");
$projetos->execute();


 while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){

 echo "<div class='modal' id='myModal".@$result_projeto['bigId']."' tabindex='1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";

echo   "<div class='modal-dialog' >";

echo    "<div class='modal-content' >";
echo   " <div class='modal-header'>";

echo    "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
echo    " <h4 class='modal-title' id='myModalLabel'>Projeto: ".@$result_projeto['bigbet']."</h4>";
echo    "</div>";

echo    "<div class='modal-body' >";
            

/*
echo     "<button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>";
*/

 echo "<table >";
 echo "<tr>";

 echo  "  <th id='th' bgcolor='#662d91'  >Resumo do Projeto</th>";
 echo  "  <th id='th' bgcolor='#662d91'  >Problema</th>";
  echo "  <th id='th' bgcolor='#662d91'  >Equipe/Área</th>";

  echo " </tr>";

  echo " <tr id='td'>";

  echo "   <td id='td' >".$result_projeto['descricao']."</td>";
  echo "   <td id='td'>".@$result_projeto['problema']."</td>";
  echo "   <td id='td'>".@$result_projeto['equipe']."</td>";

  echo "</tr>";
  echo "</table>";

  echo "<table border='0px'>";
  echo "<tr >";

 echo "<th  id='th' bgcolor='#CD0000' width='150px'>Solução Proposta</th>";
 echo "<th  id='th'  bgcolor='#CD0000' width='150px' >Departamentos Envolvidos</th>";

 echo "</tr>";

 echo "<tr >";
 echo "<td id='td'>".@$result_projeto['solucao']."</td>";
 echo "<td id='td' >".@$result_projeto['dpenvolvidos']."</td>";

  echo "</tr>";
 echo " </table>";


 echo "<table  border='0px'>";

 echo "<tr>";

 echo "<th id='th' bgcolor='#1bb3bc'>Público Alvo</th>";
 echo "<th id='th' bgcolor='#1bb3bc'>Resultados Esperados</th>";
 
 echo "</tr>";

 echo " <tr>";

 echo "<td id='td' >".@$result_projeto['publico']."</td>";
 echo "<td id='td' >".@$result_projeto['resultesp']."</td>";

 echo "</tr>";

 echo "</table>";



echo      "</div>";

echo      "</div>";

echo      "</div>";

echo      "</div>";






}

?>




    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-">
                      <img class="img-responsive" src="img/Footer3.png" alt="">
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-65">
                        Copyright &copy; Santander Ideas 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <script type="text/javascript">
    function post(){

    document.getElementById("filter_grafic").submit();




  }


  </script>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
<script src="js/tiktok.js"></script>
<script src="js/tiktok.min.js"></script>

 <script >
     

function updateStatus(iduser,idbet) {

padrinho= document.getElementById('cbopadrinho').value;
statusP ="s";


if(padrinho=="selecione"){


alert("Selecione um padrinho");



}else{


var url1="/Bigbets/update/update_Status.php?idbet="+idbet+"&statusP="+statusP+"&padrinho="+padrinho+"&iduser="+iduser;

          $.ajax({

                 url:url1,
                 dataType: 'jsonp',

                       success: function (data) {

                             if(data.update=="OK"){

                              alert("Atualizado com Sucesso!! ");

                             location.href = "/Bigbets/Aprovador/home/";


                             }



                                                 },


                         error: function (data) { 

                         

                                                  } ,
                       complete: function(){

                                
                      
                      

                      },
  
          

            });


}



   
}


function updateStatusInativar(iduser,idbet) {

statusN="n";

var url1="/Bigbets/Aprovador/home/update_Status.php?idbet="+idbet+"&statusN="+statusN;

          $.ajax({

                 url:url1,
                 dataType: 'json',

                       success: function (data) {

                             if(data.update=="OK"){

                              alert("Inativar com Sucesso!! ");

                             location.href = "/Bigbets/Aprovador/home/";


                             }



                                                 }
  
          

            });

   
}




 </script>


</body>

</html>
