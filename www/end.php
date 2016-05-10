<?php
session_start();
session_name('autenticacao');
session_destroy();
header("Location:index.php");
?>