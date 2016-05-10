<?php
require_once('classe.php');

session_start();
session_name('autenticacao');

if($_POST['type'] = 'cadastrar'){
    $email = Cliente::verificar($_POST['email1']);
    if($email){
        echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Este email ja está cadastrado!")
                            window.location="index.php";
                        </script>
                    </body>
                </html>
HTML;
    }else{
        $obj = new Cliente();
        $obj->cadastrar($_POST['nome'],$_POST['email1'],$_POST['password1']);
        
        echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Cadastrado com sucesso!")
                            window.location="index.php";
                        </script>
                    </body>
                </html>
HTML;
    }
}
else if($_POST['type'] = 'atualizar'){
    $idCliente = $_SESSION['idCliente'];
    $dataNascimento = $_POST['data'];
    $sexo = $_POST['sexo'];
    $estCivil = $_POST['estadocivil'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $usuario = $_POST['user'];
    $tel = $_POST['telefone'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $num = $_POST['num'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['uf'];
    $conversor = explode("/",$dataNascimento);
    $dataNascimento = $conversor[2]."-".$conversor[1]."-".$conversor[0];
    
    $obj->CompletarCadastro($idCliente,$dataNascimento,$sexo,$estCivil,$rg,$cpf,
                         $tel,$cep,$rua,$num,$bairro,$cidade,$estado);
}

?>