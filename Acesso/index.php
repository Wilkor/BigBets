<?php

session_start();
require_once("../config/config.php");




$_SESSION['bigid'] = @$_REQUEST['bigid'];



if (empty($_SESSION["nick"])){

//echo "<script>location.href='/Bigbets/';</script>";

}





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
    <link href="/BigBets//home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/BigBets/home/vendor/bootstrap/css/select.css" rel="stylesheet">
    <link href="https://www.santander.com.br/Theme_WCSantanderUK-theme/images/favicon.ico" rel="Shortcut Icon" />
    <!-- Theme CSS -->
    <link href="/BigBets/home/css/freelancer.min.css" rel="stylesheet">
    <link href="/BigBets/home/css/tiktok.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="/BigBets/home/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>

    #btn{
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

    #panel1, #flip1 {
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

    #panel1 {
        padding: 50px;
        display: none;
    }

</style>

<script>


       
$(document).ready(function(){
    $("#senha").keypress(function(e){


         if(e.which == 13) {
        login();
    }


    
    });


        $("#senha1").keypress(function(e){


         if(e.which == 13) {
        cadastro();
    }


    
    });



});

    









    function cadastro(){


     var sigla = $('#sigla1').val();
     sigla = sigla.replace(/[^\d]+/g,'');

     var senha = $('#senha').val();

     var url2="https://esbapi.santanderbr.corp/collaborator/v1/information/by-employee-id/"+sigla+"?gw-app-key=25765f10f55d01341bae005056906329";

     $.ajax({

         url:url2,
         dataType: 'json',

         success: function (data) {



          var url1= "/Bigbets/cadastro/cadastro.php?nome="+data.employeeName+"&sigla="+sigla+"&senha="+$('#senha1').val()+"&dep="+data.departmentName+"&salaryGroupLevel="+data.salaryGroupLevel+"&managerId="+data.managerId+"&mail="+data.mail;


          $.ajax({

             url:url1,
             dataType: 'jsonp',

             success: function (data) {

                if(data.registro=="OK"){

                   document.getElementById("panel").innerHTML=data.msg;
                   $("#panel").slideDown("slow");
                   setTimeout(function(){ $("#panel").slideUp("slow"); window.location.href="/Bigbets/Home/"; }, 2000);




               }else{

                  document.getElementById("panel").innerHTML=data.msg;
                  $("#panel").slideDown("slow");
                  setTimeout(function(){ $("#panel").slideUp("slow"); }, 3000);

              }




          },


          error: function (data) { 

     
        


          } ,
          complete: function(){





          },



      });






      },

      error: function (data) { 

     
         alert("Não foi possivel realizar seu cadastro");


          } ,

      

  });




 }
 function login(){


    var ambiente_homolog = "http://180.125.68.12:8080"; 
//var ambiente_producao = "http://bigbets.santanderbr.corp";

//var ambiente_homolog = "http://127.0.0.1:8080";



var sigla = $('#sigla').val();
sigla = sigla.replace(/[^\d]+/g,'');

var senha = $('#senha').val();




if(senha =="" && sigla==""){

    alert("Dados invalidos, verificar campos sigla e CPF.");


    return false;

}else{



   var url1 ="/Bigbets/login/login.php?sigla="+sigla+"&senha="+senha;

   $.ajax({

       url:url1,
       dataType: 'jsonp',

       success: function (data) {

        if(data.login=="OK"){
          
          if(data.msg=="ande"){
              window.location.href="Bigbets/Aprovador/home/";

          }else{

           window.location.href="/bigbets/Home/";
       }

   }else{

      document.getElementById("panel1").innerHTML=data.msg+"!";
      $("#panel1").slideDown("slow");
      setTimeout(function(){ $("#panel1").slideUp("slow"); }, 3000);

      $('#sigla').val("");
      $('#senha').val("");

  }




},


error: function (data) { 

   

} ,
complete: function(){

    
  
  

},



});


}



}

</script>

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
                <a class="navbar-brand" href="#page-top"><img id="icone" src="Big-Bets-Menu.png" style="width:100px;margin-top:-10px; "></a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#" data-toggle="modal" data-target="#myModal">Login</a>
                    </li>
                    
                    <li class="page-scroll">
                        <a href="#sobre">Cadastre-se</a>
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
                    <img class="img-responsive" src="Footer4.jpg" alt="">
                    <div class="intro-text">
                        <span class="name"></span>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section 


    <section id="portifolio">
     <div id="panel1"></div>
      <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Login</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">

                  <form action="" method="">


               <fieldset>
        <div class="row">
       
            <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Sigla</label>
                <input type="text" name="sigla" class="form-control" id="sigla" placeholder="Ex: T+Matrícula" required>
            </div>
        </div>
      
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Insira sua senha" required><Br>

                <button type="button" id="btn" onclick="login();" >Enviar</button>
            </div>
              
    

       
                  
            
          

                    
       
            
           
      
 
    </fieldset>
  

                </div>
            </div>
        </div>

</form>
</section> -->

<!-- About Section -->


<!-- Contact Section -->
<section id="sobre">
 <center><img class="img-responsive" src="cadastro.png"  style="width:70%;height:70%;" /></center><br><br>
 <div id="panel"></div>
 <div class="container">

    <div class="row">
        <div class="col-lg-12 text-center">


            <h2>Cadastre-se</h2>
            <hr class="star-primary">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">

            <form action="" method="">

                <fieldset>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="exampleInputEmail1">Nome Completo</label>
                            <input type="text" name="nome1"class="form-control" id="nome1" placeholder="Nome Completo" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="exampleInputEmail1">Sigla</label>
                            <input type="text" name="sigla1" class="form-control" id="sigla1" placeholder="Ex: T+Matrícula" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="exampleInputEmail1">CPF</label>
                            <input type="password" name="senha1" class="form-control" id="senha1" placeholder="Insira seu CPF" required><br>
                            <button type="button" id="btn" onclick="cadastro();">Cadastrar</button>
                        </div>

                    </fieldset>

                    
                </div>
            </div>

        </div>

    </form>
</section>


<!-- Modal -->


    <!-- Footer 
    <footer class="text-center">

    <center><div>
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-"><br><br><br><br>
                      <img class="img-responsive" src="Bis-Bets-Roxo.png"  alt="">
                    </div>
                 
                </div>
            </div>
        </div>

        </div></center>

        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-65">
                        Copyright &copy; Big Bets - Future Hub 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>-->

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>



    <div id="myModal" class="modal fade" role="dialog" data-backdrop="static">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background:#662d91">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color:#fff">Login</h4>
        </div>
        <div class="modal-body">
            <div id="panel1"></div>
            <fieldset>
                <div class="row">

                    <div class="form-group col-lg-12">
                        <label for="exampleInputEmail1">Sigla</label>
                        <input type="text" name="sigla" class="form-control" id="sigla" placeholder="Ex: T+Matrícula" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="exampleInputEmail1">CPF</label>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Insira seu CPF" required><Br>

                        <button type="button" id="btn" onclick="login();" >Enviar</button>
                    </div>

                </fieldset>
            </div>

        </div>

    </div>
</div>


<!-- jQuery -->
<script src="/BigBets/home/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/BigBets/home/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="/BigBets/home/js/jqBootstrapValidation.js"></script>
<script src="/BigBets/home/js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="/BigBets/home/js/freelancer.min.js"></script>
<script src="/BigBets/home/js/tiktok.js"></script>
<script src="/BigBets/home/js/tiktok.min.js"></script>

<script >






</script>


</body>

</html>
