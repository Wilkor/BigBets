

<?php


session_start();
require_once("../../config/config.php");






?>


<html lang="en" class="no-js">
<head>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'likes'],

        <?php

     $projetos = $conn->prepare("select bigbet,biglike from bets where status='s'");
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

     $soma = $conn->prepare("SELECT count(es.estagioname)as estagio FROM bets bet inner join estagio es on es.idesta = bet.estagio where bet.status='s'");
     $soma->execute();
    $result_soma=$soma->fetch(PDO::FETCH_ASSOC);

     $projetos = $conn->prepare("SELECT es.estagioname as estagio, count(bet.estagio) as valor FROM bets bet inner join estagio es on es.idesta = bet.estagio where bet.status='s' group by bet.estagio");
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
        

     $timeline = $conn->prepare("select b.bigbet as nome,log.estag,log.dtultalteracao,b.dtcadastro, es.estagioname,log.dtfinal from bets b
                            inner join loguser log on b.bigid = log.idbigbet 
                            inner join estagio es on log.estag = es.idesta where b.status='s' order by log.dtultalteracao asc");
     $timeline->execute();
     $linhas=$timeline->rowCount();

 
while($result_timeline=$timeline->fetch(PDO::FETCH_ASSOC)){

        $data1 = explode(" ", $result_timeline['dtultalteracao']);

        $pData1 = explode("-", $data1[0]);


        if($result_timeline['dtultalteracao'] == $result_timeline['dtfinal']){

        $data2 = explode(" ", $now );

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
        ",new Date(".$pData1[0].",". $pData1[1].",". $pData1[2]." )" .
        ",new Date(".$pData2[0]. ",". $pData2[1].",".$pData2[2].")],";




}
       ?>
 
     
     
    ]);

    chart.draw(dataTable);
  }



</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <script src="js/modernizr.js"></script> <!-- Modernizr -->




</head>
<!-- hijacking: on/off - animation: none/scaleDown/rotate/gallery/catch/opacity/fixed/parallax -->

<body data-hijacking="off" data-animation="gallery">

  <section class="cd-section visible">
     
 <center> <div id="top_x_div" style="width:100%; height:60%;"></div> 
  </section>

  <section class="cd-section">
   
     <center> <div id="piechart" style="width:100%; height:60%;"></div> </center>
  </section>

  <section class="cd-section">

 <center> <div id="example3.1" style="width:100%; height:100%;"></div> </center>     
  
  </section>



  <nav>
    <ul class="cd-vertical-nav">
      <li><a href="#0" class="cd-prev inactive">Next</a></li>
      <li><a href="#0" class="cd-next">Prev</a></li>
    </ul>
  </nav> <!-- .cd-vertical-nav -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/velocity.min.js"></script>
<script src="js/velocity.ui.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>