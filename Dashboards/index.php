<?php


session_start();
require_once("../config/config.php");


$tipo = $_SESSION["tipo"];
$iduser = $_SESSION["iduser"];
$name_nick = $_SESSION["nick"];
$sigla = $_SESSION["sigla"];

@$filter_grafic= $_REQUEST['cbofiltro'];


if(empty($filter_grafic) || $filter_grafic=="Todos" || $filter_grafic=="Selecione"){

  $filter_grafic=0;


}


//echo "<script>alert('".$filter_grafic."')</script>";


$frist_name = explode(" ", $name_nick);



if($tipo=="u"){


  if($filter_grafic===0){

    $where=" bet.status='s' and bet.bigresp='".$sigla."'";
    $where1=" bet.status='s' and bet.bigresp='".$sigla."'";

  }else{


   $where=" bet.status='s' and bet.bigresp='".$sigla."'  and camp.idCamp=".$filter_grafic;
   $where1=" bet.status='s' and bet.bigresp='".$sigla."' and camp.idCamp=".$filter_grafic;


 }




}else if($tipo=="p"){


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

<script type="text/javascript">


  function post(){

    document.getElementById("filter_grafic").submit();




  }

</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawStuff);

  function drawStuff() {
    var data = new google.visualization.arrayToDataTable([
      ['Move', 'likes'],

      <?php



      $projetos = $conn->prepare("select bet.bigbet,bet.biglike from bets bet 
        inner join campanhas camp on camp.idCamp = bet.campanha  where ".$where);
      $projetos->execute();

      while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){

        echo "['".$result_projeto['bigbet']."',".$result_projeto['biglike']."],";


      }



      ?>





      ]);

    var options = {
      width: 800,
      legend: { position: 'none' },

      axes: {
        x: {
              0: { side: 'top', label: 'Projetos '} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],


          <?php



          $soma = $conn->prepare("SELECT count(es.estagioname)as estagio FROM bets bet inner join estagio es on es.idesta = bet.estagio inner join campanhas camp on camp.idCamp = bet.campanha where ".$where1);
          $soma->execute();
          $result_soma=$soma->fetch(PDO::FETCH_ASSOC);

          $projetos = $conn->prepare("SELECT es.estagioname as estagio, count(bet.estagio) as  'valor' FROM bets bet inner join estagio es on es.idesta = bet.estagio inner join campanhas camp on camp.idCamp = bet.campanha where ".$where1." group by bet.estagio");
          $projetos->execute();






          while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){



            echo "['".utf8_encode($result_projeto['estagio'])."',".$result_projeto['valor']."],";


          }



          ?>




          ]);

        var soma ="<?php print $result_soma['estagio']; ?>";
        var options = {

          is3D: true,

          width: 800,
          title: 'Total de Projetos: ' + soma ,
          legend: { position: 'block' },

          axes: {
            x: {
              0: { side: 'top', label: 'Projetos '} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }


        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["timeline"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var container = document.getElementById('example3.1');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({ type: 'string', id: 'Projeto' });
        dataTable.addColumn({ type: 'string', id: 'Estágio' });
        dataTable.addColumn({ type: 'date', id: 'inicio' });
        dataTable.addColumn({ type: 'date', id: 'fim' });
        dataTable.addRows([

         <?php

         date_default_timezone_set('America/Sao_Paulo');

         $now = date('Y-m-d H-i-s');


         $timeline = $conn->prepare("select bet.bigbet as nome,log.estag,log.dtultalteracao,bet.dtcadastro, es.estagioname,log.dtfinal from bets bet
          inner join loguser log on bet.bigid = log.idbigbet 
          inner join estagio es on log.estag = es.idesta inner join campanhas camp on camp.idCamp = bet.campanha 
          where ".$where1." order by log.dtultalteracao asc");
         $timeline->execute();
         $linhas=$timeline->rowCount();


         while($result_timeline=$timeline->fetch(PDO::FETCH_ASSOC)){



          $data1 = explode(" ", $result_timeline['dtultalteracao']);
          $pData1 = explode("-", $data1[0]);


          $hora1  = explode(" ", $result_timeline['dtultalteracao']);
          $phora1 = explode(":", $hora1[1]);



          $hora2   = explode(" ", $result_timeline['dtfinal']);
          $phora2  = explode(":", $hora2[1]);


          if($result_timeline['dtultalteracao'] == $result_timeline['dtfinal']){

            $data2 = explode(" ", $now ) ;
            $phora2[0] = $phora2[0]  + 1;

          }else{

            $data2 = explode(" ", $result_timeline['dtfinal'] );
          }





          $pData2 = explode("-", $data2[0]);

          if($pData1[1]==1 && $pData2[1]==1){

            $pData1[1]=0;
            $pData2[1]=0;

          }



          echo "['". $result_timeline['nome'] ."','".
          utf8_encode($result_timeline['estagioname']) . "'" .


          ",new Date(".$pData1[0].",". ($pData1[1]-1).",". $pData1[2].",". $phora1[0].",". $phora1[1].",". $phora1[2].")" .


          ",new Date(".$pData2[0]. ",". ($pData2[1]-1).",".$pData2[2].",". $phora2[0].",". $phora2[1].",". $phora2[2].")],";




        }
        ?>



        ]);

        chart.draw(dataTable);
      }








    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">


        // [START script_body]
        google.charts.load('current', {'packages':['corechart', 'table', 'gauge', 'controls']});
        google.charts.setOnLoadCallback(drawCategoryFilter);



        function drawCategoryFilter() {

          var dashboard = new google.visualization.Dashboard(
            document.getElementById('categoryFilter_dashboard_div'));

          var control = new google.visualization.ControlWrapper({
            'controlType': 'CategoryFilter',
            'containerId': 'categoryFilter_control_div',
            'options': {
              'filterColumnIndex': 0,
              'ui': {
                'allowTyping': false,
                'allowMultiple': true,
                'selectedValuesLayout': 'belowStacked'
              }
            },
            'state': {'selectedValues': ['CPU', 'Memory']}
          });

          var chart = new google.visualization.ChartWrapper({
            'chartType': 'Gauge',
            'containerId': 'categoryFilter_chart_div',
            'options': {
              'width':700,
              'height':250,
              'redFrom': 90, 'redTo': 100,
              'yellowFrom':75, 'yellowTo': 90,
              'minorTicks': 5
            }
          });

          var data = google.visualization.arrayToDataTable([
            ['Métricas', 'Valores'],


            <?php


            $projetos1 = $conn->prepare("SELECT camp.nameCamp as estagio, count(bet.campanha) as  'valor' FROM bets bet inner join estagio es on es.idesta = bet.estagio inner join campanhas camp on camp.idCamp = bet.campanha where ".$where1." group by bet.campanha");
            $projetos1->execute();


            while($result_projeto1=$projetos1->fetch(PDO::FETCH_ASSOC)){



              echo "['".utf8_encode($result_projeto1['estagio'])."',".$result_projeto1['valor']."],";


            }



            ?>

            ]);
          dashboard.bind(control, chart);
          dashboard.draw(data);
        }
      </script>



      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart', 'table', 'gauge', 'controls']});
        google.charts.setOnLoadCallback(drawMainDashboard);

        function drawMainDashboard() {
          var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));
          var slider = new google.visualization.ControlWrapper({
            'controlType': 'NumberRangeFilter',
            'containerId': 'slider_div',
            'options': {
              'filterColumnIndex': 4,
              'ui': {
                'labelStacking': 'vertical',
                'label': 'Filtro por Likes:'
              }
            }
          });
          var categoryPicker = new google.visualization.ControlWrapper({
            'controlType': 'CategoryFilter',
            'containerId': 'categoryPicker_div',
            'options': {

              'filterColumnIndex': 4,
              'ui': {
                'labelStacking': 'vertical',
                'label': 'Gender Selection:',
                'allowTyping': false,
                'allowMultiple': false,


              }
            }
          });
          var pie = new google.visualization.ChartWrapper({
            'chartType': 'PieChart',
            'containerId': 'chart_div',
            'options': {
              'width': 300,
              'height': 300,
              'legend': 'none',
              'chartArea': {'left': 15, 'top': 15, 'right': 0, 'bottom': 0},
              'pieSliceText': 'label'
            },
            'view': {'columns': [0, 5]}
          });
          var table = new google.visualization.ChartWrapper({
            'chartType': 'Table',
            'containerId': 'table_div',
            'options': {

              'width':700,
              'height':150,



            }
          });
          var data = google.visualization.arrayToDataTable([
            ['Dono da Ideia', 'Padrinho','Projeto','Campanha','likes','Compartilhados'],


            <?php


            $projetos2 = $conn->prepare("SELECT u.nome,bet.bigbet,camp.nameCamp,bet.share,(select nome from user where userId=bet.padrinho)as Padrinho,bet.biglike as valor FROM 
              bets bet inner join user u on u.userId = bet.userId 
              inner join campanhas camp on camp.idCamp = bet.campanha ORDER BY valor desc limit 10");
            $projetos2->execute();



            while($result_projeto2=$projetos2->fetch(PDO::FETCH_ASSOC)){


              if($result_projeto2['Padrinho']==""){

                $result_projeto2['Padrinho']="Sem Padrinho";
              }


              if(@$result_projeto2[share]==0 || @$result_projeto2[share]==""){

                @$result_projeto2[share]=1;
              }



              echo "['".utf8_encode($result_projeto2['nome'])."','".$result_projeto2['Padrinho']."','".$result_projeto2['bigbet']."','".$result_projeto2['nameCamp']."',".$result_projeto2['valor'].",".$result_projeto2['share']."],";


            }



            ?>






            ]);
          dashboard.bind([slider, categoryPicker], [pie, table]);
          dashboard.draw(data);
        }
      </script>



      <script src="dash/js/jquery-2.1.4.js"></script>
      <script src="dash/js/velocity.min.js"></script>
      <script src="dash/js/velocity.ui.min.js"></script>
      <script src="js/main.js"></script> <!
    </head>

    <body data-hijacking="on" data-animation="gallery">

      <!-- Navigation -->
      <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          
           

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="hidden">
                <a href="#page-top"></a>
              </li>


              <li class="page-scroll"> 

                <form id="filter_grafic" action="index.php" method="post">
                  <select id="cbofiltro" name="cbofiltro" class="form-control" style="height:30px;margin-top:10px;" onchange="post();" required > 

                    <option value="Selecione">Selecione uma Iniciativa</option>
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
              </li>



              <li class="page-scroll">
                <a href="#likes" class="cd-prev inactive">Likes</a>
              </li>

              <li class="page-scroll">
                <a href="#estagio" >Estágio</a>
              </li>

              <li class="page-scroll">
                <a href="#timeline">TimeLine</a>
              </li>

              <li class="page-scroll">
                <a href="#Gauge">Iniciativas</a>
              </li>

              <li class="page-scroll">
                <a href="#wow">Top 10</a>
              </li>

                <li class="page-scroll" style="display: <?php echo $_SESSION['tipo']=='a'?'block':'none' ?>">
                <a href="#base">Rel.Base Full</a>
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
                <span style="font-family:Montserrat,'HelveticaNeue',Helvetica,Arial,sans-serif;text-transform:uppercase;font-weight:700;color:#662d91"><?php echo $frist_name[0];?>, o que a gente pode fazer juntos hoje?</span>

              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Portfolio Grid Section -->




      <section id="likes" class="cd-section" >

        <div class="col-lg-12 text-center">
          <h2>Projetos x Likes</h2>
          <hr class="star-primary">
        </div><br><br><br><br><br><br>

        <div>
         <center> <div id="top_x_div" style="width:100%; height:60%;"></div> </center>
       </div>

     </section>


     <section id="estagio" class="cd-section">

      <div class="col-lg-12 text-center">
        <h2>Projetos x Estágio</h2>
        <hr class="star-primary">
      </div><br><br><br><br><br><br>

      <div>
       <center> <div id="piechart" style="width:100%; height:60%;"></div> </center>
     </div>

   </section>

   <section id="timeline" class="cd-section">

    <div class="col-lg-12 text-center">
      <h2>TimeLine</h2>
      <hr class="star-primary">
    </div><br><br><br><br><br><br>

    <div>
     <center> <div id="example3.1" style="width:100%; height:100%;"></div> </center>
   </div>

 </section>


 <section id="Gauge" class="cd-section">

  <div class="col-lg-12 text-center">
    <h2>Iniciativas</h2>
    <hr class="star-primary">
  </div><br><br><br><br><br><br>

  <div>
   <center> 

    <div id="categoryFilter_dashboard_div" >
      <table class="columns">
        <tr>
          <td>
            <div id="categoryFilter_control_div" style="padding-left: 2em"></div>
          </td>
          <td>
            <div id="categoryFilter_chart_div"></div>
          </td>
        </tr>
      </table>
    </div>


  </div><br><br><br>

</section>
<section id="wow" class="cd-section">

  <div class="col-lg-12 text-center">
    <h2>Bigbets Wow!!</h2>
    <hr class="star-primary">
  </div><br><br><br><br><br><br>
  <div id="dashboard_div" >

    <table class="columns">
      <tr>
        <td>
          <div id="slider_div" style="padding-left: 15px"></div>
        </td><td>
          <div sytle="reight:400px"id="categoryPicker_div"></div>
        </td>
      </tr><tr>
        <td>
          <div id="chart_div" style="padding-top: 15px"></div>
        </td><td>
          <div id="table_div" style="padding-top: 30px"></div>
        </td>
      </tr>
    </table>
  </div>
    </section>

<section id="base" class="cd-section" style="display: <?php echo $_SESSION['tipo']=='a'?'block':'none' ?>">

  <div class="col-lg-12 text-center">
    <h2>Exportação</h2>
    <hr class="star-primary">
  </div><br><br><br><br><br><br>

  <center>
    <div style="width:30%;display:<?php echo $_SESSION['tipo']=='a'?'block':'none' ?>">

    
      <table>
       <form action="/bigbets/exporta.php" method="POST" onsubmit="return validaData();">
        <tr>
          <td>
            <label>Data Inicial</label>
            <input type="date" id="data1" class="form-control"  name="data1"></td>

            <td>
             <label>Data Final</label>
             <input type="date" id="data2" class="form-control" name="data2"></td>

           </tr>
           <tr>
            <td><br>
              <label>Iniciativas</label>
              <select id="cbofiltroex" name="cbofiltroex" class="form-control" style="height:36px;margin-top:0px;"  required > 

                <option value="Selecione">Selecione uma Iniciativa</option>
                <option value="Todos">Todos</option>
                <?php


                $estagio = $conn->prepare("select idCamp as id, nameCamp as nome from Campanhas  order by  id asc");
                $estagio->execute();

                while($result_estagio=$estagio->fetch(PDO::FETCH_ASSOC)){

                  echo "<option value=".$result_estagio['id'].">".utf8_encode($result_estagio['nome'])."</option>";


                }

                ?>


              </select>

            </td><td>
              &nbsp&nbsp&nbsp&nbsp<br><br><button  id="btn1"   style="background:#662d91">Exportar</button></td>
            </tr>
          </form>
        </table>
        <div>
        </center>

      </section>

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


      <script>

        function validaData(){


          if($("#data1").val()=="" || $("#data2").val()=="" ){

           alert("Coloque uma data valida!");

           return false;

         }else if($("#cbofiltroex").val()=="Selecione"){


          alert("Selecione uma Iniciativa!");

           return false;

         }else{

           return true;

         }


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




   </body>

   </html>
