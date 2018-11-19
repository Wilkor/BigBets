<?PHP
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.


require_once("/config/config.php");


$data1 = $_REQUEST['data1'];
$data2 = $_REQUEST['data2'];





  function cleanData(&$str)
  {
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';
    if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
      $str = "'$str";
    }
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    $str = mb_convert_encoding($str, 'UTF-16LE', 'UTF-8');
  }

  // filename for download
  $filename = "bigbets_ideias" . date('Ymd') . ".csv";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: text/csv; charset=UTF-16LE");

  $out = fopen("php://output", 'w');

  $flag = false;

  $result = $conn->prepare("SELECT bet.bigId,bet.bigbet,bet.descricao
                                  ,bet.dtCadastro,bet.status,es.estagioname,bet.publico,
                                  bet.problema,bet.equipe,bet.cboproposta,
                                  bet.resultesp,bet.dpenvolvidos,bet.biglike,bet.deslike,
                                  bet.dtUlt,bet.bigresp,(select nome from user where userId=bet.padrinho) as 'Padrinho',camp.nameCamp,bet.statusP,
                                  u.nome as 'Dono da ideia',bet.share 
                                  FROM bets bet 
                                   left join campanhas camp on camp.idCamp = bet.campanha 
                                   left join user u on u.userId = bet.userId 
                                  left join estagio es on es.idesta = bet.estagio where bet.dtCadastro between '".$data1."' and  '".$data2."'");
  $result ->execute();

  while(false !== ($row = $result->fetch(PDO::FETCH_ASSOC) )) {
    if(!$flag) {
      
      fputcsv($out, array_keys($row), ';', '"');
      $flag = true;
    }


    array_walk($row, __NAMESPACE__ . '\cleanData');
    fputcsv($out, array_values($row), ';', '"');
  }

  fclose($out);
  exit;
?>