<?php 
session_start();

unset($_SESSION['nick']); 


echo "<script>location.href='/Bigbets/acesso/';</script>";



session_destroy();


?>



