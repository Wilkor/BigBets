<?php

session_start();
require_once("../config/config.php");

header('Content-Type: text/html; charset=utf-8');

if (empty($_SESSION["sigla"])){

echo "<script>location.href='/Bigbets/';</script>";

}

date_default_timezone_set('America/Sao_Paulo');

$now = date('y-m-d');

$name_nick = $_SESSION["nick"];
$frist_name = explode(" ", $name_nick);

   $projetos = $conn->prepare("select bigId,bigId,bigbet,descricao,dtCadastro,estagio,equipe,biglike - deslike As valor,biglike,deslike,bigresp from bets where status='s' ORDER BY valor desc");
    $projetos->execute();

$o=1;
$v=1;
$d=2;
$des="des";


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
    font-size: 12px;
    border-radius:30px 30px
}

  #btn2{

    background-color:#1bb3bc; /* Green */
    border: none;
    color: white;
    padding:10px 15px;
    text-align:left;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    border-radius:35px 35px
   
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
    border-radius:30px 30px;
}




  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      height:70%;
      margin: auto;
  }


.carousel-control.right {
    right: 0;
    left: auto;
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.0000) 0,rgba(0,0,0,.5) 10%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,10) 1%);
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.0001)),to(rgba(0,0,0,.5)));
    background-image: linear-gradient(to right,rgba(0,0,0,0) 0,rgba(0,0,0,.2) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=10);
    background-repeat: repeat-x;
}


.carousel-control.left {
    background-image: -webkit-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 10%);
    background-image: -o-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
    background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,.0001)));
    background-image: linear-gradient(to right,rgba(0,0,0,.2) 0,rgba(0,0,0,0) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
    background-repeat: repeat-x;
}



.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #fff;
    background-color: rgba(127, 0, 255, 1.0);
    border: 1px solid #000000;
    border-radius: 10px;
}


.carousel-indicators .active {
    width: 12px;
    height: 12px;
    margin: 0;
    background-color:#1bb3bc;
}


.resultlike{
    display: inline-block;
    width: 15px;
    height: 15px;
    margin: 0px;
    text-align:center;
   
    border-radius: 10px;
    color:#0000;
    font-size:10px;
    font-weight: bold;
}

#panel, #flip {
    padding: 5px;
    text-align: center;
    background-color: #1bb3bc;
    border: solid 1px #fff;
    padding-top: 0px;
    font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 0.9em;
    color:#fff;
    text-align: center;
     border-radius:5px 5px;

}

#panel {
    padding: 50px;
    display: none;
}



</style>


<script type="text/javascript">

 function verificarChar(text,event) {

  //var teste = event.keyCode;

  //  var caracteresRestantes1 = 140;

   // var caracteresDigitados = parseInt(text.length);
    
   // var caracteresRestantes = caracteresRestantes1 - caracteresDigitados;

   // $(".caracteres").text(caracteresRestantes);


$(document).keypress(function(event){

   var keyCode = event.keyCode || event.which; 

   if(keyCode == 8){

      var caracteresDigitados = parseInt(text.length);

 alert("oi");


   }
});



 }


 


</script>




</head>

<body id="page-top" class="index" >

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img  id="icone" src="img/Big-Bets-Menu.png" style="width:100px;margin-top:-10px; "></a>
            </div>

        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                     <li class="page-scroll">
                        <a href="#about">Passo a Passo</a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#portfolio">Projetos</a>
                    </li>


                    <li class="page-scroll">
                        <a href="#contact">Cadastro de Ideias</a>
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
                        <span style="font-family:Montserrat,'HelveticaNeue',Helvetica,Arial,sans-serif;text-transform:uppercase;font-weight:700;color:#662d91"><?php echo $frist_name[0];?>, o que a gente pode fazer juntos hoje?</span><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->

     <section class="success" id="about">
     
                <div class="col-lg-12 text-center">
                    <h2>Passo a Passo</h2>
                    <hr class="star-primary">
                </div>
         
            
     <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
   
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="js_carosel_img/step1.png" alt="Chania">
      <div class="carousel-caption">
       
      </div>
    </div>

    <div class="item">
      <img src="js_carosel_img/step2.png" alt="Chania">
      <div class="carousel-caption">
       
      </div>
    </div>

    <div class="item">
      <img src="js_carosel_img/step3.png" alt="Flower">
      <div class="carousel-caption">
        
      </div>
    </div>

    
  </div>


  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  
       
    </section>


    <section id="portfolio">
    <div id="panel"></div>
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <li  class="page-scroll" style="list-style-type:none;"><a href="#contact">  <button type='button' class='btn btn-primary' class='button' id='btn2' style='background:#662d91;' '>Cadastre sua ideia!</button></a></li>
                    <br><br>
                    <h2>Projetos</h2>
                    <hr class="star-primary">
                </div>
            </div>
          
         <div class="table-responsive">
               
                    <table class="table ls-table" id="tabela1">
                        <thead>
                            <tr>
                                <th class="hidden-xs">ID</th>
                                <th class="">Projeto</th>
                                <th class="">Descrição</th>
                                <th class="hidden-xs">Estágio</th>
                                
                               <th class="">Inscrição</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        
<?php    
            

 while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){



if(@$result_projeto['estagio']=="12"){

$est="BCO de Intenções";

}

if(@$result_projeto['estagio']=="13"){

  $est="BCO de Ideias";
}

if(@$result_projeto['estagio']=="14"){

  $est="Em Desenvolvimento";
}

if(@$result_projeto['estagio']=="15"){

  $est="Protótipo";
}

if(@$result_projeto['estagio']=="16"){

  $est="Business Case";
}

if(@$result_projeto['estagio']=="17"){

  $est="POC";
}


if(@$result_projeto['estagio']=="18"){

  $est="Expansão";
}



@$projetos_cadastro = $conn->prepare("select iduser from cadastro where iduser=".@$_SESSION['iduser']." and idbet=".@$result_projeto['bigId']);
@$projetos_cadastro->execute();
@$result_cadastro=$projetos_cadastro->rowCount();




                         echo  "<tr>";
                         
                         echo  "<td class='hidden-xs'>".@$result_projeto['bigId']."</td>";


                        echo  "<td><a data-toggle='modal' href='#myModal".@$result_projeto['bigId']."'  href=''>".@$result_projeto['bigbet']."</a></td>";

                        echo  "<td class='hidden-xs'>".$result_projeto['descricao']."</td>";

                        echo  "<td class='hidden-xs'>".@$est."</td>";

                       
                         if(@$result_projeto['bigresp']==$_SESSION["sigla"]){


                         echo  "<td class='hidden-xs'><button type='button' class='btn btn-primary' class='button' id='btn' data-bool=''style='background:#662d91' );' disabled >Inscrito</button><br></td>";


                         echo  "<td class=''>  <span class='page-scroll'><a href='#contact'> <button type='button' id='btn'  onclick='update(".@$_SESSION['iduser'].",".@$result_projeto['bigId'].");' style='background:#662d91' '>Editar</button></a></span></td>";

                          echo  "<td class=''>&nbsp<img title='Curtir'src='img/like1.png'width='20px' height='20px' style='cursor: pointer;' onclick='update1(".@$result_projeto['bigId'].",".$o.",".$v.",".@$_SESSION['iduser'].");'><div class='resultlike'  id='".@$result_projeto['bigId']."'>".@$result_projeto['biglike']."</div></td>";






                         }else{

                          if($result_cadastro>0){
                          

                         echo  "<td class=''  ><button type='button' class='btn btn-primary' class='button'  data-bool='' id='btn' style='background:#662d91' disabled >Estamos Juntos</button><br></td>";


                         echo  "<td class=''>&nbsp<img title='Curtir'src='img/like1.png'width='20px' height='20px' style='cursor: pointer;' onclick='update1(".@$result_projeto['bigId'].",".$o.",".$v.",".@$_SESSION['iduser'].");'><div class='resultlike'  id='".@$result_projeto['bigId']."'>".@$result_projeto['biglike']."</div></td>";


                            }else{

                         echo  "<td class=''  ><a href='mailto:".@$result_projeto['bigresp']."?subject=Quero participar desse projeto!!'><button type='button' class='btn btn-primary' class='button'  data-bool='' id='btn' onclick='confirmacao(".@$_SESSION['iduser'].",".@$result_projeto['bigId'].");' style='background:#662d91' '>Junte-se a nós</button></a><br></td>";


                         echo  "<td class=''>&nbsp<img title='Curtir'src='img/like1.png'width='20px' height='20px' style='cursor: pointer;' onclick='update1(".@$result_projeto['bigId'].",".$o.",".$v.",".@$_SESSION['iduser'].");'><div class='resultlike'  id='".@$result_projeto['bigId']."'>".@$result_projeto['biglike']."</div></td>";
}

                          }

                     
                        

                       

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
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Ideias - Projetos</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
            
          <form action="/Bigbets/cadastro/cadastro_projeto.php" method="POST" id="form1">
               
    <fieldset>

        <div class="row">
            <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Nome do Projeto</label>
                <input type="text" name="txtnomeprojeto"class="form-control" id="txtnomeprojeto" placeholder="Insira seu texto aqui" value=""
                 required>
                 <input type="hidden" name="txtId" class="form-control" id="txtId" placeholder="Insira seu texto aqui" value=""
                 >
            </div>
            <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Resumo do Projeto</label>
               
                <textarea  class="form-control"  rows="2" colls="1" name="txtdescricao" id="txtdescricao" onkeypress="verificarChar(this.value,event);" placeholder="Descreva um resumo de seu projeto"></textarea>
                <!--<span class="caracteres">140</span> Restantes <br>!-->
            </div>
        </div>
      
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Solução Proposta</label>
                <input type="text" name="txtsolucao" class="form-control" rows="2" colls="1" id="txtsolucao" placeholder="Descreva a solução que você propõe?"  value="" required>
            </div>
              <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Problema</label>
                <input type="text" name="txtproblema" class="form-control" id="txtproblema" placeholder="Qual problema você está resolvendo?" value="" required>
            </div>

            <div class="form-group col-lg-6">
                <label for="exampleInputEmail1">Público-Alvo</label>
                <input type="text" name="txtpublicoalvo"  class="form-control" id="txtpublicoalvo" placeholder="Qual é o publico alvo?" value="" required>
            </div>
           
 <div class="form-group col-lg-6">
            <label for="exampleSelect">Estágio:</label>
            <select id="cboestagio" name="cboestagio" class="form-control" required > 
                <option value="0">Escolha uma opção</option>
                <option value="12">Intenção</option>
                <option value="13">Ideia</option>
                <option value="14">Desenvolvimento</option>
                <option value="15">Protótipo</option>
                <option value="16">Business Case</option>
                <option value="17">Poc</option>    
                <option value="18">Expansão</option>     
            </select>
        </div>



          <!-- <div class="form-group col-lg-4">
            <label for="exampleSelect">Gostaria de:</label>
            <select id="cboproposta" name="cboproposta" class="form-control" required >
                <option value="">Escolha uma opção</option>
                <option value="Ideia">Cadastrar uma Ideia</option>
                <option value="Projeto">Cadastrar um BigBet</option>
            </select>
        </div>-->



 <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Equipe</label>
               <input type="text" name="txtequipe" class="form-control" id="txtequipe" placeholder="Existe alguém envolvido nessa solução?" required>
            </div>

    


<div class="form-group col-lg-12">


      <div class="form-group">
      <label for="comment">Resultado Esperado</label>
      <textarea class="form-control" rows="2" colls="1" id="resultesp" name="resultesp" placeholder="Qual o resultado esperado com a implementação dessa solução?" ></textarea>
    </div>
</div>




        </div>
        <table style="width:10%">
        <tr>
        <td>
            
            <div class="box-actions">

      <input type="hidden" id="name2" value="<?=$_SESSION["nick"];?>" />
      <input type="hidden" id="idpipe" value="<?=$_SESSION["pipe"];?>"/>
            <input type="submit" id="btn1" value="Cadastrar" onclick="SendPipeDirve('Cadastrar',$('#name2').val(),$('#idpipe').val());"/>
           
        </div>   
        </td>
        <td>
            <div class="box-actions" id="limpar" style="display: none">
            <input type="reset" id="btn1" value="Limpar" onclick="alteraCad();" />  
            </div>
        </td>
        </tr>

</table>
        </div>
   
   
    </fieldset>

       
                </div>

            </div>

        </div>

    </section>
</form>

<!-- Modal -->

<?php 
//select bets.bigId,bets.bigbet,bets.descricao,bets.solucao,bets.problema,bets.publico,bets.equipe,bets.cboproposta,bets.cboprojetoafetado,bets.estagio,bets.status,bets.dtCadastro,bets.resultesp,bets.dpenvolvidos,cadastro.iduser,GROUP_CONCAT(user.nome) from cadastro INNER JOIN bets ON cadastro.idbet=bets.bigId INNER JOIN user ON cadastro.iduser=user.userId where bets.bigId=21

//select bigId,bigbet,descricao,solucao,problema,publico,equipe,cboproposta,cboprojetoafetado,estagio,status,dtCadastro,resultesp,dpenvolvidos from bets

$projetos = $conn->prepare("select bigId,bigbet,descricao,solucao,problema,publico,equipe,cboproposta,cboprojetoafetado,estagio,status,dtCadastro,resultesp from bets");
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
// echo "<th  id='th'  bgcolor='#CD0000' width='150px' >Departamentos Envolvidos</th>";
 echo "</tr>";
 echo "<tr >";
 echo "<td id='td'>".@$result_projeto['solucao']."</td>";
 //echo "<td id='td' >".@$result_projeto['dpenvolvidos']."</td>";
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
$projetos_inscrito = $conn->prepare("select bets.bigId,bets.bigbet,bets.descricao,bets.solucao,bets.problema,bets.publico,bets.equipe,bets.cboproposta,bets.cboprojetoafetado,bets.estagio,bets.status,bets.dtCadastro,bets.resultesp,cadastro.iduser,GROUP_CONCAT(user.nome) nome from cadastro INNER JOIN bets ON cadastro.idbet=bets.bigId INNER JOIN user ON cadastro.iduser=user.userId where bets.bigId=".@$result_projeto['bigId']);
$projetos_inscrito->execute();

while($result_inscritos=$projetos_inscrito->fetch(PDO::FETCH_ASSOC)){
 echo"<tr>";
 echo "<th id='th' bgcolor='#662d91'>Inscritos:</th>";
 echo "<th id='th' bgcolor='#662d91'></th>";
 echo"</tr>";
 echo " <tr>";
 echo "<td id='td' >".@$result_inscritos['nome']."</td>";
 echo "</tr>";
}

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
                      <img class="img-responsive" src="img/Footer13.png" alt="">
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-65">
                        Copyright &copy; Future Hub 2016
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<!--<script src="js_carosel/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js_carosel/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>-->
 <script >
     function alteraCad(){


document.getElementById("form1").action = "/Bigbets/cadastro/cadastro_projeto.php";
document.getElementById("limpar").style.display = "none";
document.getElementById("btn1").value="Cadastar";
document.getElementById("itenssel").style.display = "none";

     }

function confirmacao(iduser,idbet) {


decisao = confirm("Confirma a Inscrição!");

if (decisao==true){

  // location.href = "/Bigbets/cadastro/cadastro_bigbet.php?iduser="+iduser+"&idbet="+idbet;
   var url1="/Bigbets/cadastro/cadastro_bigbet.php?iduser="+iduser+"&idbet="+idbet;
    $.ajax({

                 url:url1,
                 dataType: 'jsonp',

                       success: function (data) {

                        if(data.registrado="OK"){
nome= "<?php print $_SESSION["nick"]; ?>";




                   document.getElementById("panel").innerHTML=nome+", obrigado por participar!.";
                   $("#panel").slideDown("slow");
                   setTimeout(function(){ $("#panel").slideUp("slow"); }, 3000);
                   setTimeout(function(){ location.reload(); }, 3000);


       

                        }




                                                 },


                         error: function (data) { 

                         

                                                  } ,
                       complete: function(){

                                
                      
                      

                      },
  
          

            });


} else {

return false;

}

   
}


function update(iduser,idbet) {


//decisao = confirm("Deseja Atualizar?");

//if (decisao==true){

 //location.href = "/Bigbets/update/atualiza_projeto.php?iduser="+iduser+"&idbet="+idbet;

//} else {

//return false;

//}


var url1="/Bigbets/update/atualiza_projeto.php?iduser="+iduser+"&idbet="+idbet;

          $.ajax({

                 url:url1,
                 dataType: 'jsonp',

                       success: function (data) {




document.getElementById("form1").action = "/Bigbets/update/update_projeto.php?idbet="+idbet;
document.getElementById("txtId").value=data.bigId;
document.getElementById("txtnomeprojeto").value=data.bigbet;
document.getElementById("txtdescricao").value=data.descricao;
document.getElementById("txtsolucao").value=data.solucao;
document.getElementById("txtproblema").value=data.problema;
document.getElementById("txtpublicoalvo").value=data.publico;
document.getElementById("resultesp").value=data.resultesp;
//  document.getElementById("dpenvolvidos").value=data.dpenvolvidos;
document.getElementById("txtequipe").value=data.equipe;
//document.getElementById("cboproposta").value=data.cboproposta;
//document.getElementById("cboprojetoafetado1").value=data.cboprojetoafetado;
document.getElementById("cboestagio").value=data.estagio;
//document.getElementById("itenssel").style.display = "block";
document.getElementById("limpar").style.display = "block";
document.getElementById("contact").href = "#about";
document.getElementById("btn1").value="Atualizar";

                                                 },


                         error: function (data) { 

                        

                                                  } ,
                       complete: function(){

                                
                      
                      

                      },
  
          

            });

   
}


function update1(idbet,opc,valor,iduser,nome) {


var url1="/bigbets/like/like.php?idbet="+idbet+"&opc="+opc+"&l="+valor+"&user="+iduser;

d="des";
          $.ajax({

                 url:url1,
                 dataType: 'jsonp',

                       success: function (data) {

nome= "<?php print $_SESSION["nick"]; ?>";

           if(data.biglike=="cur"){

              document.getElementById("panel").innerHTML=nome+", você já curtiu esse bigbet.";
              $("#panel").slideDown("slow");
              setTimeout(function(){ $("#panel").slideUp("slow"); }, 3000);
              setTimeout(function(){ location.reload(); }, 3000);
 
           }else{
                     
                    i=data.bigId;
                    document.getElementById(i).innerHTML=data.biglike.biglike;
                    document.getElementById("panel").innerHTML=nome+", obrigado por contribuir com essa nova história!";
                    $("#panel").slideDown("slow");
                    setTimeout(function(){ $("#panel").slideUp("slow"); }, 3000);
                    setTimeout(function(){ location.reload(); }, 3000);
 
                    }


             


                                                 },


                         error: function (data) { 

                         

                                                  } ,
                       complete: function(data){

                               


                      

                      },
  
          

            });

   
}


function update2(idbet,opc,valor,iduser) {




var url1="/bigbets/like/like.php?idbet="+idbet+"&opc="+opc+"&l="+valor+"&user="+iduser;

          $.ajax({

                 url:url1,
                 dataType: 'jsonp',

                       success: function (data) {

         


              alert(data.cur);


                                                 },


                         error: function (data) { 

                         

                                                  } ,
                       complete: function(data){

                               
                      
                      

                      },
  
          

            });

   
}


function SendPipeDirve(valor,name2,idpipe){



var tex =document.getElementById("txtnomeprojeto").value;
var opc = document.getElementById("cboestagio").value;
var resum =document.getElementById("txtdescricao").value;
var solu=document.getElementById("txtsolucao").value;
var prob=document.getElementById("txtproblema").value;
var public=document.getElementById("txtpublicoalvo").value;
var equi=document.getElementById("txtequipe").value;
var result_esp=document.getElementById("resultesp").value;
var name1 =name2;
var id_pipe =idpipe ;


if(valor=="Cadastrar"){

$.ajax({
    url: 'https://api.pipedrive.com/v1/deals?api_token=222049b2e68973a2f4c8cc514d778e4d22fc21d7',
    dataType: 'json',
    type: 'post',
    contentType: 'application/json',
    data: JSON.stringify( { "title":tex, "stage_id":opc,"Person_id":id_pipe,
        "1d3d2c0482ecbde316457269b04aabe2053a45d9":resum,
        "329056f31f1f0890d8a75aa07c2713354d1d8884":solu,
        "45a6aac0d672fed122c72682da484c1a7c1bd576":prob,
        "d7f4d4060fb7883309658bf6a6ccc4f3bc9f4fc9":public,
        "b057181906ba9fd0df34c70c5eba664ef05a45c0":equi,
        "ff1bfb4589ccdfb525d3ef0db510a5b65500f347":result_esp,
        "b8341f9c3037f78b1d45a94f54309664f51aa13a":"<?=$now;?>",
        "fb9a36c95d0dd2a91f47d1b2041d4792073a08cb":name1,
        "org_id":3} ),
    processData:true,
    success: function( data, textStatus, jQxhr ){
      
       console.log(JSON.stringify( data ) );
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
});

alert("Cadastro efetuado com sucesso!!")

}


}


 </script>


</body>

</html>





