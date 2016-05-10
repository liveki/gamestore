<?php
require_once('classe.php');
$email = $_GET['user'];
$usuario = Cliente::pegarId($email);
Cliente::dropUser($usuario->getId());
echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Usuário excluído com sucesso!")
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