<?php
require_once('classe.php');
if(isset($_POST['email']) && isset($_POST['senha'])){
    $usuario = new Cliente();
    $usuario = Cliente::logar($_POST['email'],$_POST['senha']);
    if($usuario){
        session_start();
        session_name('autent');
        $_SESSION['usuario'] = $usuario;
        header("Location:index.php");
    }else{
        echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Email ou senha incorreto!")
                            window.location="index.php";
                        </script>
                    </body>
                </html>
HTML;
    }
    
    
}else{
    echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Preencha os campos corretamente!")
                            window.location="index.php";
                        </script>
                    </body>
                </html>
HTML;
}
?>