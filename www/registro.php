<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title> Cadastro </title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<?php
require_once('classe.php');
session_start();
session_name('autent');
if(isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
	if($usuario->getNivel() == 0){
		?>
		<div id="login2"> 
			<form id="formLogado" method="post" action="end.php">
				<h3>Logado como:<?php echo " ".$usuario->getNome(); ?></h3><br>
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
?>

<?php
}else{
?>
	<div id="login"> 
	<form id="formLogin" method="post" 
		action="logando.php">
		<h3>Email:</h3><br>
		<input type="text" name="email" id="user" /><br>
		<h3>Senha:</h3><br>
		<input type="password" name="senha" /><br><br>
		<input type="submit" id="enviar" value="Entrar">
		<input type="button" id="cadastrar" value="Cadastre-se" onClick="parent.location='registro.php'" />
	</form>
	</div>
<?php
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
	
<section id="conteudoCadastro">
	<div class="largura">
		<h1> CADASTRE SEUS DADOS CORRETAMENTE</h1>
		<form id="formCadastro" name="form1" method="post" action="cadastrando.php">
			<ul>
				<li>
				<label for="nome">Nome:</label>
				<input type="text" id="nome" name="nome" required  placeholder="Informe Seu Nome" />
				</li>
						
				<li>
				<label for="email">E-mail:</label>
				<input type="email" id="email1" name="email1" required  placeholder="Informe seu e-mail" />
				<img src="images/Accept-icon.png" id="img1" class="esconde" />
				</li>
				
				<li>
				<label for="email2">Repete E-mail:</label>
				<input type="email" id="email2" name="email2" required  placeholder="Repita o e-mail" />
				<img src="images/Accept-icon.png" id="img2" class="esconde" />
				<img src="images/Delete-icon.png" id="img3" class="esconde" />
				</li>						
				
				<li>
				<label for="password1">Senha:</label>
				<input type="password" id="password1" name="password1" required  placeholder="Informe Uma Senha" />
				<img  src="images/Accept-icon.png" id="img4" class="esconde" />
				</li>
				
				<li>
				<label for="password2">Repete Senha:</label>
				<input type="password" id="password2" name="password2" required  placeholder="Repita a Senha " />
				<img  src="images/Accept-icon.png" id="img5" class="esconde" />
				<img  src="images/Delete-icon.png" id="img6" class="esconde" />
				</li>
							
				<li>
					<input type="submit" id="enviar" value="Registrar" onClick="validarSenha()" />
					<input type="Reset" id="limpar" value="Limpar" /> 
				</li>
			</ul>
		</form>
	</div>
</section>
    
<footer>
<h1><sup> Patrick Chagas e Marlon - T3IT1&copy; 2016 </sup></h1>
</footer> 
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/lytebox.js"></script>	
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>