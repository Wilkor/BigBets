<?php
session_start();


$_SESSION['bigid'] = @$_REQUEST['bigid'];



echo "<script>location.href='/Bigbets/acesso';</script>";


?>