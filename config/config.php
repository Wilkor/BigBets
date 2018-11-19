<?php

$servidor = "localhost";
$tipo_servidor = "mysql";
$nome_do_banco = "bigbets";
$usuario = "root";
$senha = "";

//instancia um objeto da classe PDO chamado $conn
$conn = new PDO("$tipo_servidor:host=$servidor;dbname=$nome_do_banco",$usuario,$senha);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>