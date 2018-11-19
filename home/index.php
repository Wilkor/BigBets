<?php

session_start();
require_once("../config/config.php");

//header('Content-Type: text/html; charset=utf-8');



@$tipo_user = @$_SESSION["tipo"];

if(@$_SESSION['bigid']){

  @$ids_bet = $_SESSION['bigid'];


}





$projetos_camp = $conn->prepare("select * from campanhas where status='s'");

$projetos_camp->execute();
$projetos_camp->Rowcount();

//echo "<script>alert('".$projetos_camp->Rowcount()."')</script>";

$projetos_total = $conn->prepare("select b.bigId,b.bigId,b.bigbet,
  b.descricao,b.dtCadastro,b.estagio,b.equipe,b.biglike - deslike As valor,
  b.biglike,b.deslike,b.bigresp,es.estagioname as estagio, b.status,b.padrinho,b.userId from bets b 
  inner join estagio es on b.estagio = es.idesta 


  where b.status='s'  ORDER BY valor desc");

$projetos_total->execute();

if (empty($_SESSION["sigla"])){

  echo "<script>location.href='/Bigbets/';</script>";

}else{



}

date_default_timezone_set('America/Sao_Paulo');

$now = date('y-m-d');

$name_nick = $_SESSION["nick"];
$frist_name = explode(" ", $name_nick);



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


  <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="jquery.paginate.js?id=1"></script>


  

  <script type="text/javascript">


    function rolar(){


      setTimeout(function () {

        window.location.ref="#portfolio";

      },2000)


    }


  </script>



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
    word-wrap: break-word;
  }

  #td {

    height:120px;
    width:200px;
    padding-top: 0px;
    font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 0.9em;
    color:black;
    text-align: center;
    word-wrap: break-word;


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


  #btn3{
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

    display: inline-block;width:128px;height: 15px; margin: 0px;text-align:center;border-radius: 10px;color:#000000;font-size:10px; font-weight: bold;
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

  #b_transp {


   margin-top: 5px;

   background-color: Transparent;
   background-repeat:no-repeat;
   border: none;
   cursor:pointer;
   overflow: hidden;

 }


 #panel {
  padding: 50px;
  display: none;
}
#paginacao{
  padding-top: 10px;
  text-align: center;
}

</style>


<script type='text/javascript'>


  $(document).ready(function(){


  


    setInterval(function(){

     $("#icone").fadeOut(300);

     $("#icone").fadeIn(3000);

    },10);





  });


  function validaForm(){

    var tipo ="<?php print $_SESSION['tipo'];?>";



    if(tipo=="p"){

     if(document.getElementById('cboestagio').value=="" || document.getElementById('cboestagio').value=="Selecione"){

       alert("Preencha o campo Estágio");
       document.getElementById('cboestagio').focus();
       return false;

     }



   }else if(tipo=="u"){


    if(document.getElementById('cbcampanha').value==" " || document.getElementById('cbcampanha').value=="Selecione"){


      alert("Preencha o campo Campanha");
      document.getElementById('cbcampanha').focus();
      return false;

    }



  }else{

   return true;

 }

}




var  userId = "<?php print $_SESSION["sigla"]; ?>";

var iduser = "<?php print $_SESSION["iduser"]; ?>";

var tipo = "<?php print $_SESSION["tipo"]; ?>";

<?php


if($tipo_user=="p"){

  $where="b.status='s' and  b.padrinho='".$_SESSION['iduser']."' ORDER BY valor desc";


}else{

  $where="b.status='s'  ORDER BY valor desc";

}



$projetos_userId = $conn->prepare("select b.bigId,b.bigId,b.bigbet,
  b.descricao,b.dtCadastro,b.estagio,b.equipe,b.biglike - deslike As valor,
  b.biglike,b.deslike,b.bigresp,es.estagioname as estagio, b.status,b.padrinho,b.userId from bets b 
  inner join estagio es on b.estagio = es.idesta


  where ".$where);
$projetos_userId->execute();



while($result_projeto_userId=$projetos_userId->fetch(PDO::FETCH_ASSOC)){


  $userId = $result_projeto_userId['userId'];


}



$projetos = $conn->prepare("select b.bigId,b.bigId,b.bigbet,
  b.descricao,b.dtCadastro,b.estagio,b.equipe,b.biglike - deslike As valor,
  b.biglike,b.deslike,b.bigresp,es.estagioname as estagio, b.status,b.padrinho,b.userId from bets b 
  inner join estagio es on b.estagio = es.idesta 



  where ".$where);
$projetos->execute();


while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){

  @$dados.="['".$result_projeto['bigId']."','".$result_projeto['bigbet']."','"
  .$result_projeto['descricao']."','".utf8_encode($result_projeto['estagio']."','"
    .$result_projeto['biglike']."','".$result_projeto['bigresp']."','".$result_projeto['padrinho']."'],");



}



if($_SESSION['tipo']=="u"){

  $where1="b.status='s' and  b.bigresp='".$_SESSION['sigla']."' ORDER BY valor desc";

  $projetos1 = $conn->prepare("select b.bigId,b.bigId,b.bigbet,
    b.descricao,b.dtCadastro,b.estagio,b.equipe,b.biglike - deslike As valor,
    b.biglike,b.deslike,b.bigresp,es.estagioname as estagio, b.status,b.userId from bets b 
    inner join estagio es on b.estagio = es.idesta


    where ".$where1);
  $projetos1->execute();


  while($result_projeto1=$projetos1->fetch(PDO::FETCH_ASSOC)){

    @$dados1.="['".$result_projeto1['bigId']."','".$result_projeto1['bigbet']."','"
    .$result_projeto1['descricao']."','".utf8_encode($result_projeto1['estagio']."','".$result_projeto1['biglike']."','".$result_projeto1['bigresp']."'],");


  }

}

if($_SESSION['tipo']=="p"){

  $where1="b.status='s'  and b.padrinho='".$_SESSION['iduser']."' ORDER BY valor desc";

  $projetos1 = $conn->prepare("select b.bigId,b.bigId,b.bigbet,
    b.descricao,b.dtCadastro,b.estagio,b.equipe,b.biglike - deslike As valor,
    b.biglike,b.deslike,b.bigresp,es.estagioname as estagio, b.status,b.userId from bets b 
    inner join estagio es on b.estagio = es.idesta


    where ".$where1);
  $projetos1->execute();


  while($result_projeto1=$projetos1->fetch(PDO::FETCH_ASSOC)){

    @$dados1.="['".$result_projeto1['bigId']."','".$result_projeto1['bigbet']."','"
    .$result_projeto1['descricao']."','".utf8_encode($result_projeto1['estagio']."','".$result_projeto1['biglike']."','".$result_projeto1['bigresp']."'],");


  }

}




?>











var data =[<?php print  $projetos_total->Rowcount(); ?>];
var dados1 =[<?php print @$dados1; ?>];

var tamanhoPagina = 5;
var pagina = 0;

var tamanhoPagina1 = 5;
var pagina1 = 0;


function filter() {




  paginar($("#cbofiltro").val());



}



function paginar(filter) {



 var opc="<?php print @$ids_bet ;?>";



 if(opc){

   var url1= "/Bigbets/Home/lista_projetos.php?bigid="+opc;

 }else{

   var url1= "/Bigbets/Home/lista_projetos.php?camp="+filter;

 }






 $('#listar > tr').remove();
 var tbody = $('#listar');

 var getBiglike="";

 $.ajax({

  url:url1,
  dataType: 'json',

  success: function (data) {


    for (var i = pagina * tamanhoPagina; i < data.length && i < (pagina + 1) * tamanhoPagina; i++) {


      if(data[i].biglike==0){

        getBiglike =" Seja o primeiro a curtir";

      }else if(data[i].biglike==1){

       getBiglike = data[i].biglike+" Pessoa curtiu";

     }else if(data[i].biglike>1){

      getBiglike = data[i].biglike+" Pessoas curtiram";

    }


    tbody.append(

      $('<tr>')

      .append($('<td class="hidden-xs text-center">').append(data[i].bigId)).append($('</td>'))

      .append($('<td class="text-center">').append($('<a data-toggle="modal" href="#myModal'+data[i].bigId+'">').append(data[i].bigbet))).append($('</a></td>'))
      .append($('<td class="hidden-xs text-center">').append(data[i].descricao)).append($('</td>'))
      .append($('<td class="hidden-xs text-center">').append(data[i].estagio)).append($('</td>'))

      .append($('<td class="text-center">')
        .append($('<span class="page-scroll">')
          .append($('<a href="#contact">'))
          .append($( iduser== data[i].padrinho ?'<a href="#contact"><button type="button" id="btn"  onclick="update('+iduser+","+data[i].bigId+');" style="background:#662d91">Editar</button></a></span></td>':''))))
      .append($('<td class="text-center" >&nbsp <img title="Curtir"   id="img_like'+data[i].bigId+'" value="img_like'+data[i].bigId+'"  src="img/like1.png" width="30px" height="30px" style="cursor: pointer;"  onclick="update1('+data[i].bigId+","+1+","+1+","+iduser+',this.value);"></img><br><div class="resultlike" onclick="getPeople('+data[i].bigId+');"  id="'+data[i].bigId+'"><button id="b_transp" data-toggle="tooltip" title="Veja as pessoas que curtiram sua ideia">'+getBiglike+'</button></div></td>'))
      .append($('<td class="text-center">&nbsp <img title="Compartilhar" src="share-black.png" width="30px" height="30px" style="cursor: pointer;"  onclick="share('+data[i].bigId+","+1+","+1+","+iduser+');"><br><div class="resultlike"  id="'+data[i].bigId+'1">&nbsp&nbsp'+data[i].share+'</div></td>'))
      .append($('<td class="hidden-xs text-center">').append(data[i].area)).append($('</td>'))


      )
  }

  $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(data.length / tamanhoPagina));

}




});



}



function ajustarBotoes() {

  $('#proximo').prop('disabled', data <= tamanhoPagina || pagina >= Math.ceil(data / tamanhoPagina) - 1);
  $('#anterior').prop('disabled', data  <= tamanhoPagina || pagina == 0);
}


$(function () {
  $('#proximo').click(function () {
    if (pagina < data / tamanhoPagina - 1) {
      pagina++;
      filter();
      ajustarBotoes();
    }
  });
  $('#anterior').click(function () {
    if (pagina > 0) {
      pagina--;
      filter();
      ajustarBotoes();
    }
  });
  filter();
  ajustarBotoes();


});



function paginar1() {

  $('#listar1 > tr').remove();
  var tbody1 = $('#listar1');



  for (var i = pagina1 * tamanhoPagina1; i < dados1.length && i < (pagina1 + 1) * tamanhoPagina1; i++) {


    tbody1.append(

      $('<tr>')

      .append($('<td class="hidden-xs text-center">').append(dados1[i][0])).append($('</td>'))

      .append($('<td class="text-center">').append($('<a data-toggle="modal" href="#myModal'+dados1[i][0]+'">').append(dados1[i][1]))).append($('</a></td>'))
      .append($('<td class="hidden-xs text-center">').append(dados1[i][2])).append($('</td>'))
      .append($('<td class="hidden-xs text-center">').append(dados1[i][3])).append($('</td>'))

      .append($('<td class="text-center">')
        .append($('<span class="page-scroll">')
          .append($('<a href="#contact">'))
          .append($(tipo == "p"?'<a href="#contact"><button type="button" id="btn"  onclick="update('+iduser+","+dados1[i][0]+');" style="background:#662d91">Editar</button></a></span></td>':''))))





      )
  }



  $('#numeracao1').text('Página ' + (pagina1 + 1) + ' de ' + Math.ceil(dados1.length / tamanhoPagina1));
}

function ajustarBotoes1() {
  $('#proximo1').prop('disabled', dados1.length <= tamanhoPagina1 || pagina1 >= Math.ceil(dados1.length / tamanhoPagina1) - 1);
  $('#anterior1').prop('disabled', dados1.length <= tamanhoPagina1 || pagina1 == 0);
}
$(function () {
  $('#proximo1').click(function () {
    if (pagina1 < dados1.length / tamanhoPagina1 - 1) {
      pagina1++;
      paginar1();
      ajustarBotoes1();
    }
  });
  $('#anterior1').click(function () {
    if (pagina1 > 0) {
      pagina1--;
      paginar1();
      ajustarBotoes1();
    }
  });
  paginar1();
  ajustarBotoes1();
});


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
        <a class="navbar-brand" href="#page-top"><img  id="icone" src="img/Big-Bets-Menu.png" style="width:100px;margin-top:-10px; " onclick="lista();"></a>
      </div>


      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden">
            <a href="#page-top"></a>
          </li>

          <?php


          if($_SESSION["tipo"] =="a"){


            echo "<li class='page-scroll'><a href='#user'>Usuários</a></li>";

            echo " <li class='page-scroll'><a href='#portfolio'>Projetos</a></li>";

            echo " <li class='page-scroll'><a href='/Bigbets/Iniciativas/index.php'>Iniciativas</a></li>";

            echo " <li class='page-scroll'><a href='/Bigbets/Estagio/index.php'>Estágios</a></li>";


            echo "<li class='page-scroll' active><a href='/Bigbets/Dashboards/index.php'>Relatórios</a></li>";

            echo "<li class='page-scroll'><a href='/Bigbets/Aprovador/home/index.php'>Aprovador</a></li>";




          }else if($_SESSION["tipo"] =="p"){


            echo "<li class='page-scroll'><a href='#about'>Passo a Passo</a></li>";

            echo " <li class='page-scroll'><a href='#portfolio'>Projetos</a></li>";

            echo "<li class='page-scroll'><a href='#myidea'>Meus Projetos</a></li>";

            echo "<li class='page-scroll' active><a href='/Bigbets/Dashboards/index.php'>Relatórios</a></li>";



          }else{

        

            echo " <li class='page-scroll'><a href='#portfolio'>Projetos</a></li>";


            if($projetos_camp->Rowcount()>0){

              echo "<li class='page-scroll'><a href='#contact'>Cadastro de Ideias</a></li>";

            }


            echo " <li class='page-scroll'><a href='/Bigbets/Iniciativas/index.php'>Iniciativas</a></li>";

            echo "<li class='page-scroll'><a href='#myidea'>Minhas ideias</a></li>";

            echo "<li class='page-scroll' active><a href='/Bigbets/Dashboards/index.php'>Relatórios</a></li>";


          }





          ?>

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
          <img class="img-responsive" src="img/Bis-Bets-Roxo1.png" alt="">
          <div class="intro-text"><br><br>
            <span style="font-family:Montserrat,'HelveticaNeue',Helvetica,Arial,sans-serif;text-transform:uppercase;font-weight:700;color:#662d91"><?php echo $frist_name[0];?>, o que a gente pode fazer juntos hoje?</span><br><br><br>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Portfolio Grid Section -->





  <section class="success" id="about" style="display: <?php echo $_SESSION['tipo']=="a" || $_SESSION['tipo']=="p"?'block':'none'?>">

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



  <section class="success" id="user" style="display: <?php echo $_SESSION['tipo']=="a"?'block':'none'?>">


    <div class="col-lg-12 text-center">
      <li  class="page-scroll" style="list-style-type:none;"></li>
      <br><br>
      <h2>Usuários</h2>
      <hr class="star-primary">


    </div>

    <div class="container" style="width:50%">

      <table >
        <tbody>
          <tr>
            <th scope="row"></th>
            <td> <label for="exampleSelect">Pesquisar usuários:</label>

              <input type="text" class="form-control"  id="pesquisa_user" placeholder="Ex:697608" name="pesquisa_user" ></td>
              <td><br>&nbsp&nbsp<button id="btn1" style="background:#662d91" onclick="getUser();" >Pesquisar</button></td>

            </tr>

          </tbody>
        </table><Br>



        

        <div id="campos_user" style="width:63%;display:none">

          <form action="/bigbets/Home/upuser.php" method="POST">


           <table>
             <tr>
              <td>
                <label for="exampleSelect">Nome:</label>
                <input type="text" class="form-control"  id="nome_user" name="nome_user" ><br>
              </td>
              <td>
                <label for="exampleSelect">E-mail:</label>
                <input type="text" class="form-control"  id="mail" name="mail" ><br>
              </td>

              <tr>
                <td>
                 <label for="exampleSelect">Departamento:</label>
                 <input type="text" class="form-control"  id="dep" name="dep" ><br>
               </td>
               <td>
                <label for="exampleSelect">Gestor:</label>
                <input type="text" class="form-control"  id="managerId" name="managerId" ><br>
              </td>

              <label for="exampleSelect">Tipo do Usuário</label>
              <input type="hidden" id="iduser_id" name="iduser_id">

              <table>
                <tr>
                  <td>
                    <select id="cboTipo" name="cboTipo" class="form-control" required >

                     <option value="Selecione">Selecione</option>
                     <option value="a">Admin</option>
                     <option value="p">Padrinho</option>
                     <option value="u">Usuário</option>

                   </select></td>
                   <td>

                    &nbsp&nbsp<input type="submit" id="btn1"  value="Atualizar" style="background:#662d91" ></td>

                    <tr>
                    </table>

                  </div>

                </form>
              </div><br><br>


            </section>




            <section id="portfolio">

              <div class="container" style="width:100%">
                <div class="row">

                  <div class="col-lg-12 text-center">
                    <li  class="page-scroll" style="list-style-type:none;display:<?php echo $_SESSION['tipo']=="a" || $_SESSION['tipo']=="p"?'none':'block';?>">
                      <a href="#contact">  
                        <button type='button' class='btn btn-primary' class='button' id='btn2' style='background:#662d91;' >Cadastre sua ideia!</button></a></li>
                        <br><br>
                        <h2>Projetos</h2>
                        <hr class="star-primary">
                        <div id="panel"></div>
                      </div>
                    </div>

                    <div >


                     <div class="row"> <!-- 4 + 8 = 12 -->
                      <div class="col-md-4">

                        <label for="exampleSelect">Filtro por Iniciativas:</label>
                        <select id="cbofiltro" name="cbofiltro" class="form-control" required > 

                          <option value="Selecione">Selecione</option>
                          <option value="Todos">Todos</option>
                          <?php


                          $estagio = $conn->prepare("select idCamp as id, nameCamp from Campanhas  where status='s' order by  id asc");
                          $estagio->execute();

                          while($result_estagio=$estagio->fetch(PDO::FETCH_ASSOC)){

                            echo "<option value=".$result_estagio['id'].">".utf8_decode($result_estagio['nameCamp'])."</option>";


                          }

                          ?>


                        </select>

                      </div>
                      <div class="col-md-8"><br>
                       <button id="btn1" style="background:#662d91" onclick="filter();" >Pesquisar</button>
                     </div> 
                   </div><br>








                   <div class="table-responsive" style="width:100%">

                     <table class="table table-bordered table-responsive table-hover" style="width:100%">
                      <thead>
                        <tr>
                          <th class="hidden-xs text-center">ID</th>
                          <th class="text-center">Projeto</th>
                          <th class="hidden-xs text-center">Descrição</th>
                          <th class="hidden-xs text-center">Iniciativa - Estátigio</th>



                          <th class="text-center">Editar</th>



                          <th class="text-center">Likes</th>
                          <th class="text-center">Compartilhar</th>
                          <th class="text-center">Departamento</th>

                        </tr>
                      </thead>
                      <tbody id="listar">
                        <tr>
                          <td class="text-center" colspan="2">Nenhum dado ainda...</td>
                        </tr>
                      </tbody>
                    </table>



                    <div> 
                      <center><div id="paginacao" >
                        <button class="btn btn-default" id="anterior" disabled>&lsaquo; Anterior</button>
                        <button class="btn btn-default" id="numeracao" type="button"></button>
                        <button class="btn btn-default" id="proximo" disabled>Próximo &rsaquo;</button>
                      </div></center>
                    </div>




                  </div>
                  <div> 

                  </div>

                </div>
              </section>





              <div style="display: <?php echo $_SESSION['tipo']=="u" || $_SESSION['tipo']=="p"?'block':'none'?>">
               <section id="myidea">

                <div class="container" style="width:100%">
                  <div class="row">

                    <div class="col-lg-12 text-center">
                      <li  class="page-scroll" style="list-style-type:none;"></li>
                      <br><br>

                      <?php
                      echo  $_SESSION['tipo']=="u"?"<h2>Minhas Ideias</h2>":"<h2>Meus Projetos</h2>";

                      ?>
                      <hr class="star-primary">
                      <div id="panel"></div>
                    </div>
                  </div>

                  <div class="table-responsive" style="width:100%">

                   <table class="table table-bordered table-responsive table-hover" style="width:100%">
                    <thead>
                      <tr>
                        <th class="hidden-xs text-center">ID</th>
                        <th class="text-center text-center">Projeto</th>
                        <th class="hidden-xs text-center">Descrição</th>
                        <th class="hidden-xs text-center">Estátigio</th>
                        <th class="text-center">Editar</th>


                      </tr>
                    </thead>
                    <tbody id="listar1">
                      <tr>
                        <td class="text-center" colspan="2">Nenhum dado ainda...</td>
                      </tr>
                    </tbody>
                  </table>



                  <div> 
                    <center><div id="paginacao1" >
                      <button class="btn btn-default" id="anterior1" disabled>&lsaquo; Anterior</button>
                      <button class="btn btn-default" id="numeracao1" type="button"></button>
                      <button class="btn btn-default" id="proximo1" disabled>Próximo &rsaquo;</button>
                    </div></center>
                  </div>




                </div>
                <div> 

                </div>

              </div>
            </section>
          </div>


          <!-- About Section -->


          <div style="display: <?php echo $_SESSION['tipo']=="u" && $projetos_camp->Rowcount()>0 || ($_SESSION['tipo']=="p" && @$userId!="" && $projetos_camp->Rowcount()>0 ) ?'block':'none'?>">
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

                    <form action="/Bigbets/cadastro/cadastro_projeto.php" method="POST" onsubmit="return validaForm();" id="form1">

                      <fieldset>

                        <div class="row">
                          <div class="form-group col-lg-12">
                            <label for="exampleInputEmail1">Nome do Projeto</label>
                            <input type="text" name="txtnomeprojeto"class="form-control" id="txtnomeprojeto" placeholder="Insira seu texto aqui" value=""
                            required>
                            <input type="hidden" name="txtId" class="form-control" id="txtId" placeholder="Insira seu texto aqui" value=""
                            >

                            <input type="hidden" name="txtuserId" class="form-control" id="txtuserId" placeholder="Insira seu texto aqui" value="<?php echo $_SESSION['tipo']=="u" ?$_SESSION['iduser']: $userId; ?>"
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



                          <div style="display: <?php echo  $_SESSION['tipo']=="p"?'block':'none'?>">

                            <div class="form-group col-lg-6">
                              <label for="exampleSelect">Estágio:</label>
                              <select id="cboestagio" name="cboestagio" class="form-control" required > 


                                <?php


                                $estagio = $conn->prepare("select idesta as id, estagioname as nome from estagio order by  id asc");
                                $estagio->execute();

                                while($result_estagio=$estagio->fetch(PDO::FETCH_ASSOC)){

                                  echo "<option value=".$result_estagio['id'].">".utf8_encode($result_estagio['nome'])."</option>";


                                }

                                ?>


                              </select>
                            </div>

                          </div>


                          <div style="display: <?php echo $_SESSION['tipo']=="u"?'block':'none'?>">
                            <div class="form-group col-lg-6">
                              <label for="exampleSelect">Iniciativas:</label>
                              <select id="cbcampanha" name="cbocampanha" class="form-control" onchange="abrirModal(this.value);" required > 

                                <option value="Selecione">Selecione</option>
                                <?php


                                $estagio = $conn->prepare("select idCamp as id, nameCamp as nome from Campanhas where status='s' order by  id asc");
                                $estagio->execute();

                                while($result_estagio=$estagio->fetch(PDO::FETCH_ASSOC)){

                                  echo "<option value=".$result_estagio['id'].">".utf8_encode($result_estagio['nome'])."</option>";


                                }

                                ?>


                              </select>
                            </div>

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

                <input type="submit" id="btn3" style="background:#662d91;display:<?php echo $_SESSION['tipo']=="a" || $_SESSION['tipo']=="p"  ?'none;':'block;'?>" value="Cadastrar" />

              </div>   
            </td>
            <td>
              <div class="box-actions" id="limpar" style="display: none">
                <input type="reset" id="btn1" style="background:#662d91" value="Limpar" onclick="alteraCad();" />  
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
</div>
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
        echo "<table id='teste' >";
        echo "<tr>";
        echo  "  <th id='th' bgcolor='#662d91'  >Resumo do Projeto</th>";
        echo  "  <th id='th' bgcolor='#662d91'  >Problema</th>";
        echo "  <th id='th' bgcolor='#662d91'  >Equipe/Área</th>";
        echo " </tr>";
        echo " <tr id='td'>";
        echo "   <td id='td' >".@$result_projeto['descricao']."</td>";
        echo "   <td id='td'>".@$result_projeto['problema']."</td>";
        echo "   <td id='td'>".@$result_projeto['equipe']."</td>";
        echo "</tr>";
        echo "</table>";
        echo "<table id='nada' border='0px'>";
        echo "<tr >";
        echo "<th  id='th' bgcolor='#CD0000' width='150px'>Solução Proposta</th>";
        // echo "<th  id='th'  bgcolor='#CD0000' width='150px' >Departamentos Envolvidos</th>";
        echo "</tr>";
        echo "<tr >";
        echo "<td id='td'>".@$result_projeto['solucao']."</td>";
        //echo "<td id='td' >".@$result_projeto['dpenvolvidos']."</td>";
        echo "</tr>";
        echo " </table>";
        echo "<table id='nada'  border='0px'>";
        echo "<tr>";
        echo "<th id='th' bgcolor='#1bb3bc'>Público Alvo</th>";
        echo "<th id='th' bgcolor='#1bb3bc'>Resultados Esperados</th>";
        echo "</tr>";
        echo " <tr>";
        echo "<td id='td' >".@$result_projeto['publico']."</td>";
        echo "<td id='td' >".@$result_projeto['resultesp']."</td>";
        echo "</tr>";
        $projetos_inscrito = $conn->prepare("select u.nome,u.sigla from bets bet inner join user u on u.userId = bet.userId  where bet.bigId=".@$result_projeto['bigId']);
        $projetos_inscrito->execute();

        while($result_inscritos=$projetos_inscrito->fetch(PDO::FETCH_ASSOC)){
          echo"<tr>";
          echo "<th id='th' bgcolor='#662d91'>Responsável/Dono da Ideia:</th>";
          echo "<th id='th' bgcolor='#662d91'></th>";
          echo"</tr>";
          echo " <tr>";
          echo "<td id='td' align='center'>".strtoupper($result_inscritos['sigla'])." - ".strtoupper($result_inscritos['nome'])."</td>";
          echo "</tr>";
        }

        echo "</table>";
        echo      "</div>";
        echo      "</div>";
        echo      "</div>";
        echo      "</div>";
        echo      "</div>";





      }



      ?>



      <!-- Trigger the modal with a button -->
      <div style ="display:none"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="modal" data-target="#myModal">Open Modal</button></div>
      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="background:#662d91;">
              <button type="button"  style="color:white" class="close" data-dismiss="modal">&times;</button>
              <h3 style="color:white">Descrição da Iniciativa</h3>
            </div>
            <div class="modal-body" style="font-size:20px" id="modal_desc">
              <h2></h2>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
          </div>

        </div>
      </div>


      <!-- Trigger the modal with a button -->
      <button type="button" style="display:none"  class="btn btn-info btn-lg" data-toggle="modal" id="modal_like" data-target="#myModal_like"></button>

      <!-- Modal -->
      <div id="myModal_like" class="modal fade" role="dialog">
        <div class="modal-dialog" >

          <!-- Modal content-->
          <div class="modal-content" >
           <div class="modal-header" style="background:#662d91;">
            <button type="button"  style="color:white" class="close" data-dismiss="modal">&times;</button>
            <h4 style="color:white">Pessoas que Curtiram</h4>
          </div>
          <div class="modal-body" style="overflow-y: scroll; max-height:50%; " >

            <div class="list-group" id="list_like" >





            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>

      </div>
    </div>


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
              Copyright &copy; Santander Ideias 2016
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


    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>
    <script src="js/tiktok.js"></script>
    <script src="js/tiktok.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<!--<script src="js_carosel/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="js_carosel/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>-->
  <script >



    function abrirModal(id){


      var url1="/Bigbets/Home/lista_iniciativa.php?id="+id;

      $.ajax({

       url:url1,
       dataType: 'json',

       success: function (data) {



        document.getElementById('modal_desc').innerHTML=data.desc;
        document.getElementById('modal').click();




      }



    });




    }


    function alteraCad(){


      tipo_user = "<?php print $_SESSION["tipo"]; ?>";

      document.getElementById("form1").action = "/Bigbets/cadastro/cadastro_projeto.php";
      document.getElementById("limpar").style.display = "none";

      if(tipo_user=="a" || tipo_user=="p" ){

        document.getElementById("btn1").style.display="none";


      }else{
       document.getElementById("btn1").value="Cadastar";

     }




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
                                  //document.getElementById("contact").href = "#about";

                                  document.getElementById('btn3').style.display="block";
                                  document.getElementById("btn3").value="Atualizar";

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
              //setTimeout(function(){  $( "#listar" ).load(); }, 3000);

              if(session==data.resp){


                alert(data.resp);


              }

            }else{

              i=data.bigId;


              if(data.biglike.biglike==0){

               document.getElementById(i).innerHTML=" Seja o primeiro a curtir";

             }else if(data.biglike.biglike==1){


               document.getElementById(i).innerHTML=" Pessoa curtiu";

             }else if(data.biglike.biglike>1){

              document.getElementById(i).innerHTML=" Pessoas Curtiram";

            }

            document.getElementById("panel").innerHTML=nome+", obrigado por curtir essa ideia!";
            $("#panel").slideDown("slow");
            setTimeout(function(){ $("#panel").slideUp("slow"); }, 3000);
            setTimeout(function(){ location.reload(); }, 4000);

          }





        },


        error: function (data) { 



        } ,
        complete: function(data){






        },



      });


}




function share(idbet,opc,valor,iduser,nome) {


  var url1="/bigbets/like/share.php?idbet="+idbet+"&opc="+opc+"&l="+valor+"&user="+iduser;

  d="des";
  $.ajax({

   url:url1,
   dataType: 'jsonp',

   success: function (data) {

    nome= "<?php print $_SESSION["nick"]; ?>";


    

    i=data.bigId+"1";


    document.getElementById(i).innerHTML=data.biglike.share;
    document.getElementById("panel").innerHTML=nome+", obrigado por compartilhar essa ideia!";
    $("#panel").slideDown("slow");
    setTimeout(function(){ $("#panel").slideUp("slow"); }, 3000);
    setTimeout(function(){  window.location.href='mailto:?subject= Bigbets&body=Oi, tudo bem? estou compartilhando essa grande aposta! Conheça essa ideia e não esqueça de dar um like: http://bigbets.santanderbr.corp/Bigbets/acesso/index.php?bigid='+idbet; }, 3000);







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



function getUser(){


 var url1="/bigbets/Home/consult_user.php?sigla="+$("#pesquisa_user").val()+"&tipo="+tipo;

 $.ajax({

   url:url1,
   dataType: 'json',

   success: function (data) {


    if(data.erro!="erro"){



     document.getElementById("campos_user").style.display="block";
     document.getElementById("nome_user").value=data.nome;
     document.getElementById("cboTipo").value=data.tipo;
     document.getElementById("iduser_id").value=data.userId;
     document.getElementById("mail").value=data.mail;
     document.getElementById("dep").value=data.dep;
     document.getElementById("managerId").value=data.managerId;

   }else{

    document.getElementById("campos_user").style.display="none";
    alert("Dados invalidos!");


  }



}



});

 




}


function getPeople(bigid){





  var url1="/bigbets/Home/getPeopleLike.php?id="+bigid;

  $.ajax({

   url:url1,
   dataType: 'json',

   success: function (data) {


    $("#modal_like").click();

    document.getElementById("list_like").innerHTML="";
    for (var i = 0; i <data.length; i++) {

      if(data[i].status=="Of"){


        document.getElementById("list_like").innerHTML+='<div style="height:13%;width:100%" class="list-group-item "><b>Nome</b>: '+data[i].nome+'<br><b>Área</b>: '+data[i].area+'<b></b><div style="background:#808080;color:#808080;border-radius:50%;-moz-border-radius:50%;height:26%;width:4%"></div></div><br>';
      }else{

        document.getElementById("list_like").innerHTML+='<div style="height:13%;width:100%" class="list-group-item "><b>Nome</b>: '+data[i].nome+'<br><b>Área</b>: '+data[i].area+'<b></b><div style="background:#008000;color:#008000;border-radius:50%;-moz-border-radius:50%;height:26%;width:4%"></div></div><br>';

      }


    }

  }


});






}









</script>


</body>

</html>





