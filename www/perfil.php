<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title> Perfil </title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen" />

</head>
<body>
<?php
require_once('classe.php');
session_start();
session_name('autent');
if(isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
	$dados = Cliente::getUsuario($usuario->getId());
	if($dados->getNivel() == 0){
		?>
		<div id="login2"> 
			<form id="formLogado" method="post" action="end.php">
				<h3>Logado como:<?php echo " ".$dados->getNome(); ?></h3><br>
				<input type="submit" id="sair" value="Sair" />
				<input type="button" id="editar" value="Editar Perfil" onClick="parent.location='perfil.php'" />
			</form>
		</div>
		<?php
	}else{
		?>
		<div id="login2"> 
			<form id="formLogado" method="post" action="end.php">
				<h3>Logado como:<?php echo " ".$usuario->getNome(); ?></h3><br>
				<input type="submit" id="sair" value="Sair" />
				<input type="button" id="editar" value="Editar Perfil" onClick="parent.location='perfil.php'" /><br>
				<input type="button" id="editar" value="Gerenciar" onClick="parent.location='secreta_adm.php'" /><br>
			</form>
		</div>
	<?php
	}
}else{
	header("Location:index.php");
}
?>

<nav>

	<a href="index.php">Home</a>
	<a href="sobre.php">Sobre</a>
    <a href="produtos.php">Produtos</a>
    <a href="contato.php">Contato</a>
    <a id="conta">Conta</a>

</nav>
	<header id="banner"> 
    	<ul class="bxslider">
    		<li><img src="banners/banner1.jpg"></li>	
            <li><img src="banners/banner2.jpg"></li>
            <li><img src="banners/banner3.jpg"></li>
            <li><img src="banners/banner4.jpg"></li>
            <li><img src="banners/banner5.jpg"></li>
            <li><img src="banners/banner6.jpg"></li>
        </ul>
    </header>
	
	<div class="icones">
	<img src="images/Accept-icon.png" id="img1" />
	<img src="images/Accept-icon.png" id="img2" />
	<img style="position:absolute; right:25px; top:45px; z-index: 2;" src="images/Delete-icon.png"id="img3" height="25px" width="25px" />
	</div>
	
	<div class="iconesEmail">
		<img  src="images/Accept-icon.png" id="img4" />
		<img  src="images/Accept-icon.png" id="img5" />
		<img style="position:absolute; right:25px; top:45px; z-index: 3;" src="images/Delete-icon.png"id="img6" height="25px" width="25px" />
	</div>
	
		

	<section id="conteudoPerfil">
    	<div class="largura">
			<h1> ATUALIZE SEU CADASTRO PARA EFETUAR ALGUMA COMPRA</h1>
			<form id="formCadastro" name="form1" method="post" action="alterando.php">
				<ul>
					<li>
						<label for="nome">Nome:</label>
						<input type="text" id="nome" name="nome" required placeholder='Informe seu Nome' value="<?php echo $dados->getNome(); ?>" />
					</li>
						
					<li>
						<label for="data">Data de Nascimento:</label>
						<input type="text" id="data" 
						name="data" required  placeholder='Informe sua Data de Nascimento' value="<?php echo $dados->getDatNasc(); ?>" />
					</li>
						
					<li>
						<label for="email">E-mail Atual:</label>
						<input type="email" readonly
						name="email" required  placeholder="E-mail Atual" value="<?php echo $dados->getEmail(); ?>" />
					</li>
									
					<li>
						<label for="email">E-mail Novo:</label>
						<input type="email" id="email1"
						name="email1" placeholder="Informe seu novo e-mail">
					</li>
					
					<li>
						<label for="email2">Repete E-mail:</label>
						<input type="email" id="email2" 
						name="email2" placeholder="Repita o novo e-mail">
					</li>
					<li>
						<label for="password1">Senha Atual:</label>
						<input type="password" 
						name="password" placeholder="Senha Atual">
					</li>
					<li>			
						<label for="password1">Nova Senha:</label>
						<input type="password" id="password1" 
						name="password1" placeholder="Informe Sua Nova Senha">
					</li>
							
					<li>
						<label for="password2">Repete Senha:</label>
						<input type="password" id="password2" 
						name="password2" placeholder="Repita Sua Nova Senha">
					</li>
												
					<li>
						<label for="sexo">Sexo:</label>
						<select type="text" id="sexo" name="sexo" required>
									<option value="masculino">Masculino</option>
									<option value="feminino">Feminino</option>
						</select>
					</li>
						
						
					<li>
						<label for="estadocivil">Estado Civil:</label>
						<select type="text" id="estadocivil" name="estadocivil" required>
							<option value="Solteiro(a)">Solteiro(a)</option>
							<option value="Casado(a)">Casado(a)</option>
							<option value="Separado(a)">Separado(a)</option>
							<option value="Divorciado(a)">Divorciado(a)</option>
							<option value="Viuvo(a)">Viúvo(a)</option>
						</select>
					</li>
						
					<li>
						<label for="rg">Registro Geral:</label>
						<input type="text" id="rg" name="rg" required  placeholder="Informe Seu RG" value="<?php echo $dados->getRg(); ?>">
					</li>
						
					<li>
						<label for="cpf">CPF:</label>
						<input type="text" name="cpf" id="cpf" placeholder="Informe seu CPF" onBlur="ValidarCPF(form1.cpf)" value="<?php echo $dados->getCpf(); ?>"/>
					</li>
									
					<li>
						<label for="telefone">Telefone:</label>
						<input type="text" name="telefone" required id="telefone" value="<?php echo $dados->getTelefone(); ?>" maxlength="15" placeholder="Informe Seu Telefone" />
					</li>
					
					<li>
						<label for="cep">CEP:</label>
						<input id="cep" name="cep" required type="text" maxlength="9" placeholder="Informe o CEP" onblur="getEndereco()" value="<?php echo $dados->getCep(); ?>" />
					</li>
					
					<li>
						<label for="rua">Rua:</label>
						<span class="add-on"></span>
						<input id="rua" name="rua" required type="text" placeholder="Nome da Rua / Logradouro" value="<?php echo $dados->getRua(); ?>"/>
					</li>
					
					<li>
						<label for="num">Nº:</label>
						<span class="add-on"></span>
						<input id="numero" name="num" required type="text" placeholder="Número" value="<?php echo $dados->getNumero(); ?>" />
					</li>
					
					<li>
						<label for="bairro">Bairro:</label>
						<span class="add-on"></span>
						<input id="bairro" name="bairro" required type="text" placeholder="Informe o Bairro" value="<?php echo $dados->getBairro(); ?>"/>
					</li>

					<li>
						<label for="cidade">Cidade:</label>
						<span class="add-on"></span>
						<input id="cidade" name="cidade" required type="text" placeholder="Informe a Cidade" value="<?php echo $dados->getCidade(); ?>"/>
					</li>
								
					<li>
						<label for="estado">Estado:</label>
						<span class="add-on"></span>
						<input id="estado" name="estado" required type="text" placeholder="Informe a UF" value="<?php echo $dados->getEstado(); ?>"/>
					</li>
					
					<li>
						<input type="submit" id="enviar" value="ATUALIZAR" onClick="validarSenha()">
						<input type="Reset" id="limpar" value="LIMPAR"> 
					</li>
				</ul>
			</form>
		</div>
	</section>
	<div class="catalogo" name="catalogo">
	
		<a class="genero">Gênero&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;></a>
		<a class="plataforma">Plataforma&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;></a>
		<a id="maisvendidos">Mais Vendidos</a>
		<a id="promocao">Promoção</a>
		<a id="lancamentos">Lançamentos</a>
	
	</div>
	
	<div class="genero_catalogo"> 
	
		<a href="">Ação</a>
		<a href="">Aventura</a>
		<a href="">Corrida</a>
		<a href="">Estratégia</a>
		<a href="">Esporte</a>
		<a href="">Jogo On-line</a>
		<a href="">Simulação</a>
		<a href="">RPG</a>
		<a href="">Outros Gêneros</a>
	
	</div>
	
	<div class="plataforma_catalogo"> 
		
		<a href="">Playstation 3</a>
		<a href="">Playstation 4</a>
		<a href="">XBOX 360</a>
		<a href="">XBOX One</a>
		<a href="">Nintendo 3DS</a>
		<a href="">PC</a>
	
	</div>
    
 <div class="up">
 <a href="registro.php"><img src="images/up.png"></a>
 </div>
    
<footer>
<h1><sup> Patrick Chagas e Marlon - T3IT1&copy; 2016 </sup></h1>
</footer> 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/cep.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/lytebox.js"></script>	
<script type="text/javascript" src="js/script.js"></script>
<script>
var cmbCivil = document.getElementById("estadocivil");
var cmbSexo = document.getElementById("sexo");
var sexo = "<?php echo $dados->getSexo(); ?>";
var estCivil = "<?php echo $dados->getEstCivil(); ?>";
var i = 0;
while(cmbSexo.options[i].value != sexo){
	cmbSexo.selectedIndex = [i +1];
	i++;
}

while(cmbCivil.options[i].value != estCivil){
	cmbCivil.selectedIndex = [i + 1];
	i++;
}
</script>
</body>
</html>