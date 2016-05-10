<?php
require_once('classe.php');
session_start();
session_name('adm');
if(isset($_POST['type'])){
    $tipo = $_POST['type'];
    if($tipo == "ALTERAR"){// INICIO ALTERAR ADM
        $id = Cliente::pegarId($_POST['email']);
        $usuario = Cliente::getUsuario($id->getId());
        $telAntigo = str_replace("(","",$usuario->getTelefone());
        $ddd2 = explode(")",$telAntigo);
        $usuario->setPrefixo($ddd2[0]);
        $usuario->setTelefone($ddd2[1]);
        $modDados = new Cliente();
        $modDados->setNome($_POST['nome']);
        $modDados->setEmail($_POST['email2']);
        $modDados->setSenha($_POST['password2']);
        $modDados->setSexo($_POST['sexo']);
        $modDados->setEstCivil($_POST['estadocivil']);
        $modDados->setRg($_POST['rg']);
        $modDados->setCpf($_POST['cpf']);
        $telefone = $_POST['telefone'];
        $telefone = str_replace("(","",$telefone);
        $ddd = explode(")",$telefone);
        $modDados->setPrefixo($ddd[0]);
        $modDados->setTelefone($ddd[1]);
        $modDados->setCep($_POST['cep']);
        $modDados->setRua($_POST['rua']);
        $modDados->setNumero($_POST['num']);
        $modDados->setBairro($_POST['bairro']);
        $modDados->setCidade($_POST['cidade']);
        $modDados->setEstado($_POST['estado']);
        if($modDados->getNome() == $usuario->getNome())
            $modDados->setNome($usuario->getNome());
        if($modDados->getEmail() == $usuario->getEmail())
            $modDados->setEmail($usuario->getEmail());
        if($modDados->getSenha() == $usuario->getSenha())
            $modDados->setSenha($usuario->getSenha);
        if($modDados->getSexo() == $usuario->getSexo())
            $modDados->setSexo($usuario->getSexo());
        if($modDados->getEstCivil() == $usuario->getEstCivil())
            $modDados->setEstCivil($usuario->getEstCivil());
        if($modDados->getRg() == $usuario->getRg())
            $modDados->setRg($usuario->getRg());
        if($modDados->getCpf() == $usuario->getCPf())
            $modDados->setCpf($usuario->getCpf());
        if($modDados->getPrefixo() == $usuario->getPrefixo())
            $modDados->setPrefixo($usuario->getPrefixo());
        if($modDados->getTelefone() == $usuario->getTelefone())
            $modDados->setTelefone($usuario->getTelefone());
        if($modDados->getCep() == $usuario->getCep())
            $modDados->setCep($usuario->getCep());
        if($modDados->getRua() == $usuario->getRua())
            $modDados->setRua($usuario->getRua());
        if($modDados->getNumero() == $usuario->getNumero())
            $modDados->setNumero($usuario->getNumero());
        if($modDados->getBairro() == $usuario->getBairro())
            $modDados->setBairro($usuario->getBairro());
        if($modDados->getCidade() == $usuario->getCidade())
            $modDados->setCidade($usuario->getCidade());
        if($modDados->getEstado() == $usuario->getEstado())
            $modDados->setEstado($usuario->getEstado());

        $modDados->setId($usuario->getId());

        Cliente::updUsuario($modDados);


    echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Dados atualizados!")
                            window.location="lista_usuarios.php";
                        </script>
                    </body>
                </html>
HTML;
    }// FINAL ALTERAR ADM
}

require_once('classe.php');
$senhaAtual = $_POST['password'];
$novaSenha = $_POST['password1'];
$repeteSenha = $_POST['password2'];
$emailAtual = $_POST['email'];
$emailNovo = $_POST['email1'];
$repeteEmail = $_POST['email2'];
$senha = '';
$email = '';
if($senhaAtual != ""){//TEM INTERESE EM MUDAR A SENHA
    if($novaSenha == "" or $repeteSenha == ""){
    echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Por favor, informe a nova senha corretamente.")
                            window.location="perfil.php";
                        </script>
                    </body>
                </html>
HTML;
        exit;
    }else{
        $usuario = Cliente::testSenha($emailAtual);
        if($usuario->getSenha() != $senhaAtual){
            echo "Você tem interesse em mudar sua senha."."<br>";
            echo "Porém, sua senha atual está errada ou não foi informada."." ";
            echo "<a href='perfil.php'>Voltar</a>";
            exit;
        }else{
            if($novaSenha != $repeteSenha){
                echo "Você tem interesse em mudar sua senha."."<br>";
                echo "Porém, sua nova senha está errada ou não foi informada."." ";
                echo "<a href='perfil.php'>Voltar</a>";
                exit;
            }else{
                $senha = $novaSenha;
            }
        }
        
    }
    
}else{// NÃO TEM INTERESSE EM MUDAR A SENHA
    $usuario = Cliente::testSenha($emailAtual);
    $senha = $usuario->getSenha();
}

if($emailNovo != "" or $repeteEmail != ""){//TEM INTERESSE EM TROCAR EMAIL
    if($emailNovo != $repeteEmail){
        echo <<<HTML
                <html>
                    <body>
                        <script>
                            alert("Por favor, informe o novo email corretamente.")
                            window.location="perfil.php";
                        </script>
                    </body>
                </html>
HTML;
        exit;
    }else{
        $email = $emailNovo;
    }
    
}else{//NÃO TEM INTERESSSE EM TROCAR EMAIL
    $email = $emailAtual;
}

if($novaSenha != "" or $repeteSenha != ""){//TEM INTERESSE EM MUDAR A SENHA
    if($senhaAtual == ""){
        echo "Você tem interesse em mudar sua senha."."<br>";
        echo "Porém, sua senha atual está errada ou não foi informada."." ";
        echo "<a href='perfil.php'>Voltar</a>";
        exit;
    }
}
if($emailNovo != $repeteEmail){
    echo "Por favor, informe o novo email corretamente."."<br>";
    echo "<a href='perfil.php'>Voltar</a>";
    exit;
}
if($novaSenha != $repeteSenha){
    echo "Por favor, informe a nova senha corretamente"."<br>";
    echo "<a href='perfil.php'>Voltar</a>";
    exit;
}


$id = $usuario->getId();
$emailAtual = $usuario->getEmail();
$senhaAtual = $usuario->getSenha();
$usuario = new Cliente();
$usuario->setId($id);
$usuario->setNome($_POST['nome']);
$dataNasc = explode("/",$_POST['data']);
$dataNasc = array_reverse($dataNasc);
$dataNasc = implode("-",$dataNasc);
$usuario->setDatNasc($dataNasc);
$usuario->setSexo($_POST['sexo']);
$usuario->setEstCivil($_POST['estadocivil']);
$usuario->setRg($_POST['rg']);
$usuario->setCpf($_POST['cpf']);
$usuario->setCidade($_POST['cidade']);
$usuario->setEstado($_POST['estado']);
$usuario->setBairro($_POST['bairro']);
$usuario->setRua($_POST['rua']);
$usuario->setNumero($_POST['num']);
$usuario->setCep($_POST['cep']);
$telefone = $_POST['telefone'];
$telefone = str_replace("(","",$telefone);
$ddd = explode(")",$telefone);
$usuario->setPrefixo($ddd[0]);
$usuario->setTelefone($ddd[1]);
$usuario->setEmail($email);
$usuario->setSenha($senha);
Cliente::updUsuario($usuario);


?>