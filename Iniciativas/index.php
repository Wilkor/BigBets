<?php

session_start();
require_once("../config/config.php");

//header('Content-Type: text/html; charset=utf-8');


$tipo_user = $_SESSION["tipo"];





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

    display: inline-block;width: 10px;height: 15px; margin: 0px;text-align:center;border-radius: 10px;color:#0000;font-size:10px; font-weight: bold;
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
#paginacao{
      padding-top: 10px;
      text-align: center;
    }

</style>


  <script type='text/javascript'>




 var  userId = "<?php print $_SESSION["sigla"]; ?>";

 var iduser = "<?php print $_SESSION["iduser"]; ?>";

var tipo = "<?php print $_SESSION["tipo"]; ?>";

    <?php


   $projetos = $conn->prepare("select idCamp,nameCamp,descCamp,status from Campanhas ");



    $projetos->execute();


while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){

  @$dados.="['".$result_projeto['idCamp']."','".$result_projeto['nameCamp']."','"
  .$result_projeto['descCamp']."','"
  .$result_projeto['status']."'],";

}



    ?>


    var dados =[<?php print $dados; ?>];
    var tamanhoPagina = 4;
    var pagina = 0;

    function paginar() {

      $('#listar > tr').remove();
      var tbody = $('#listar');



      for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) * tamanhoPagina; i++) {


        tbody.append(

          $('<tr>')

          .append($('<td class="hidden-xs text-center">').append(dados[i][0])).append($('</td>'))

          .append($('<td  class="text-center">').append($('<a data-toggle="modal" href="#myModal'+dados[i][0]+'">').append(dados[i][1]))).append($('</a></td>'))
          .append($('<td class="hidden-xs text-center">').append(dados[i][2])).append($('</td>'))
          .append($('<td class="hidden-xs text-center">').append(dados[i][3]=="s" ? 'Ativa' : 'Desativada')).append($('</td>'))
          .append($('<td class="text-center">')
          .append($('<span class="page-scroll">')
          .append($('<a href="#contact">'))
          .append($( tipo=="a" ?'<a href="#contact"><button type="button" id="btn"  onclick="update('+iduser+","+dados[i][0]+');" style="background:#662d91">Editar</button></a></span></td>':''))))
          
        

          
          )
      }



      $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
    }

    function ajustarBotoes() {
      $('#proximo').prop('disabled', dados.length <= tamanhoPagina || pagina >= Math.ceil(dados.length / tamanhoPagina) - 1);
      $('#anterior').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
    }
    $(function () {
      $('#proximo').click(function () {
        if (pagina < dados.length / tamanhoPagina - 1) {
          pagina++;
          paginar();
          ajustarBotoes();
        }
      });
      $('#anterior').click(function () {
        if (pagina > 0) {
          pagina--;
          paginar();
          ajustarBotoes();
        }
      });
      paginar();
      ajustarBotoes();
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
                <a class="navbar-brand" href="#page-top"><img  id="icone" src="img/Big-Bets-Menu.png" style="width:100px;margin-top:-10px; "></a>
            </div>

        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>

                  <?php

                  if($_SESSION['tipo']=="a"){

                  echo  "<li class='page-scroll'>
                        <a href='#contact'>Cadastrar Inciativas</a>
                    </li>";

                  }



                  ?>
                    
                    <li class="page-scroll">
                        <a href="#portfolio">Consultar Iniciativas</a>
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
                    <img class="img-responsive" src="img/Bis-Bets-Roxo1.png" alt="">
                    <div class="intro-text"><br><br>
                        <span style="font-family:Montserrat,'HelveticaNeue',Helvetica,Arial,sans-serif;text-transform:uppercase;font-weight:700;color:#662d91"><?php echo $frist_name[0];?>, o que a gente pode fazer juntos hoje?</span><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->


    <section id="portfolio">
   
        <div class="container" style="width:100%">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <li  class="page-scroll" style="list-style-type:none;"></li>
                    <br><br>
                    <h2>Iniciativas</h2>
                    <hr class="star-primary">
                    <div id="panel"></div>
                </div>
            </div>
          
         <div class="table-responsive" style="width:100%">
               
                 <table class="table table-bordered table-responsive table-hover" style="width:100%">
    <thead>
      <tr>
        <th class='hidden-xs text-center'>ID</th>
        <th class='hidden-xs text-center'>Iniciativas</th>
        <th class='hidden-xs text-center'>Descrição</th>
        <th class='hidden-xs text-center'>Status</th>
        <th class='hidden-xs text-center'>Editar</th>
       

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

    <!-- About Section -->


    <!-- Contact Section -->
    <section id="contact" style="display: <?php echo $_SESSION['tipo']=="a"?'block':'none'?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Cadastro de Iniciativas</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
            
          <form action="/Bigbets/cadastro/cadastro_campanha.php" method="POST" id="form1">
               
    <fieldset>

        <div class="row">
            <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Nome da Iniciativa</label>
                <input type="text" name="txtnomeprojeto"class="form-control" id="txtnomeprojeto" placeholder="Insira seu texto aqui" value=""
                 required>
                 <input type="hidden" name="txtId" class="form-control" id="txtId" placeholder="Insira seu texto aqui" value=""
                 >
            </div>
            <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Descrição</label>
               
                <textarea  class="form-control"  rows="2" colls="1" name="txtdescricao" id="txtdescricao" onkeypress="verificarChar(this.value,event);" placeholder="Descreva o objetivo da Campanhas"></textarea>
                <!--<span class="caracteres">140</span> Restantes <br>!-->
            </div>
            <div class="form-group col-lg-6">
            <label for="exampleSelect">Status da Iniciativa</label>
            <select id="cboestagio" name="cboestagio" class="form-control" required > 
            <option value="selecione">Selecione</option>
            <option value="s">Ativa</option>
            <option value="n">Desativada</option>
            </select><br>

              <table style="width:10%">
        <tr>
        <td>
            
            <div class="box-actions">

            <input type="hidden" id="name2" value="<?=$_SESSION["nick"];?>" />
            <input type="hidden" id="idpipe" value="<?=$_SESSION["pipe"];?>"/>
            <input type="submit" id="btn1" style="background:#662d91" value="Cadastrar" />
           
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

        </div>

        </div><br>


      
        </div>
   
   
    </fieldset>

       
                </div>

            </div>

        </div>

    </section>
</form>

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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<!--<script src="js_carosel/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js_carosel/jssor.slider-21.1.6.mini.js" type="text/javascript"></script>-->
 <script >


     function alteraCad(){


document.getElementById("form1").action = "/Bigbets/cadastro/cadastro_campanha.php";
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

var url1="/Bigbets/update/atualiza_campanha.php?iduser="+iduser+"&idbet="+idbet;

          $.ajax({

                 url:url1,
                 dataType: 'jsonp',

                       success: function (data) {




                                  document.getElementById("form1").action = "/Bigbets/update/update_campanha.php?idbet="+idbet;
                                  document.getElementById("txtId").value=data.bigId;
                                  document.getElementById("txtnomeprojeto").value=data.bigbet;
                                  document.getElementById("txtdescricao").value=data.descricao;
                                   document.getElementById("cboestagio").value=data.status;
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
              //setTimeout(function(){  $( "#listar" ).load(); }, 3000);

              if(session==data.resp){


            alert(data.resp);


              }
 
           }else{
                     
                    i=data.bigId;
                    document.getElementById(i).innerHTML=data.biglike.biglike;
                    document.getElementById("panel").innerHTML=nome+", obrigado por contribuir com essa nova história!";
                    $("#panel").slideDown("slow");
                    setTimeout(function(){ $("#panel").slideUp("slow"); }, 3000);
                   // setTimeout(function(){ location.reload(); }, 3000);
 
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





