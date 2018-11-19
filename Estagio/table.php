<?php


session_start();
require_once("../config/config.php");

//header('Content-Type: text/html; charset=utf-8');

if (empty($_SESSION["sigla"])){

echo "<script>location.href='/Bigbets/';</script>";

}

date_default_timezone_set('America/Sao_Paulo');

$now = date('y-m-d');









?>

<!DOCTYPE html>
<html>
<!-- #include file="inc/conexao.asp" -->

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="googlebot" content="noindex, nofollow">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.js"></script>
	<style type="text/css">


		table {
			border-spacing: 0px;
			border-collapse: separate;
			width: 100%;
			border-bottom: 1px solid #aaa;
			text-align: center;
		}
		
		thead td {
			margin: 0;
			padding: 0;
			padding: 2px;
		}
		
		thead th {
			margin: 0;
			padding: 5px;
			border-bottom: 1px solid #aaa;
		}
		
		div {
			padding-top: 10px;
			text-align: center;
		}
	</style>



	<script type='text/javascript'>


 var  userId = "<?php print $_SESSION["sigla"]; ?>";

 var iduser = "<?php print $_SESSION["iduser"]; ?>";


 alert(userId +" "+ iduser);

		<?php

   $projetos = $conn->prepare("select b.bigId,b.bigId,b.bigbet,
    b.descricao,b.dtCadastro,b.estagio,b.equipe,b.biglike - deslike As valor,
    b.biglike,b.deslike,b.bigresp,es.estagioname as estagio, b.status from bets b 
    inner join estagio es on b.estagio = es.idesta 
    where b.status='s' ORDER BY valor desc");
    $projetos->execute();


while($result_projeto=$projetos->fetch(PDO::FETCH_ASSOC)){

  @$dados.="['".$result_projeto['bigId']."','".$result_projeto['bigbet']."','"
  .$result_projeto['descricao']."','".utf8_encode($result_projeto['estagio']."','".$result_projeto['biglike']."','".$result_projeto['bigresp']."'],");

}



		?>


		var dados =[<?php print $dados; ?>];
		var tamanhoPagina = 6;
		var pagina = 0;

		function paginar() {

			$('table > tbody > tr').remove();
			var tbody = $('table > tbody');



			for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) * tamanhoPagina; i++) {


				tbody.append(

					$('<tr>')

					.append($('<td class="hidden-xs">').append(dados[i][0]))

					.append($('<td>').append($('<a data-toggle="modal" href="#myModal'+dados[i][0]+'">').append(dados[i][1])))
					.append($('<td class="hidden-xs">').append(dados[i][2]))
					.append($('<td class="hidden-xs">').append(dados[i][3]))

					.append($('<td class=" ">')
					.append($('<span class="page-scroll">')
					.append($('<a href="#contact">'))
					.append($(userId == dados[i][5]?'<button type="button" id="btn"  onclick="update('+iduser+","+dados[i][0]+');" style="background:#662d91">Editar</button>':''))))

					.append($('<td class=" ">&nbsp')
					.append($('<img title="Curtir" src="img/like1.png" width="20px" height="20px" style="cursor: pointer;" onclick="update1('+dados[i][0]+","+1+","+1+","+iduser+');">')
					.append($('<div class="resultlike"  id="'+dados[i][0]+'">'))).append(dados[i][4]))


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
<body>
	
	
	
	
	<table class="table table-bordered table-responsive table-hover">
		<thead>
			<tr>
				<th class="text-left">ID</th>
				<th class="text-center">Projeto</th>
				<th class="text-center">Descrição</th>
				<th class="text-center">Estágio</th>
				<th class="text-center">Editar</th>
                <th class="text-center">Likes</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="text-center" colspan="2">Nenhum dado ainda...</td>
			</tr>
		</tbody>
	</table>
	
	
	
	<div>	
		<div class="btn-group">
		  <button class="btn btn-default" id="anterior" disabled>&lsaquo; Anterior</button>
		  <button class="btn btn-default" id="numeracao" type="button"></button>
		  <button class="btn btn-default" id="proximo" disabled>Próximo &rsaquo;</button>
		</div>
	</div>
	
	
	
</body>
</html>