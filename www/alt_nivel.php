<?php
require_once('classe.php');
$email = $_GET['user'];
$usuario = Cliente::pegarId($email);
$nivel = $usuario->getNivel();
if($nivel == 0){
    $nivel = 1;
}
else if($nivel != 0){
    $nivel = 0;
}
Cliente::altNivel($usuario->getId(),$nivel);
echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Usuário alterado!")
                            window.location="lista_usuarios.php";
                        </script>
                    </body>
                </html>
HTML;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>