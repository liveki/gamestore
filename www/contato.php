<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title> Fale Conosco </title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<?php
require_once('classe.php');
session_start();
session_name('autent');
if(isset($_SESSION['usuario'])){
	$usuario = $_SESSION['usuario'];
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
	<div id="login"> 
	<form id="formLogin" method="post" 
		action="logando.php">
		<h3>Usuário:</h3><br>
		<input type="text" name="email" id="user" placeholder="Digite Seu Usuário" /><br>
		<h3>Senha:</h3><br>
		<input type="password" name="senha" placeholder="Digite Sua Senha" /><br><br>
		<input type="submit" id="enviar" value="Entrar">
		<input type="button" id="cadastrar" value="Cadastre-se" onClick="parent.location='registro.php'" />
	</form>
	</div>
<?php
}
?>
<div id="home"></div>

<nav>

	<a href="index.php">Home</a>
	<a href="sobre.php">Sobre</a>
    <a href="produtos.php" id="produto">Produtos</a>
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

	<section id="conteudo">
    	<div class="largura">
			<h1> ENVIE SEU RECADO E RESPONDEREMOS O QUANTO ANTES ! </h1><br><br><br>
			
			
			<form id="fale" method="post" 
		action="">
		<ul>
			<li>
			<label for="nome">Nome:</label>
			<input type="text" id="nome" 
			name="nome" required  placeholder="Digite seu Nome">
			</li>
			
			<li>
			<label for="email">E-mail:</label>
			<input type="email" id="email" 
			name="email" required  placeholder="Digite seu e-mail">
			</li>
						
			<li>
			<label for="assunto">Assunto:</label>
			<select required>
			<option value="" >Selecione O Assunto</option>
			<option value="defeito">Produto Com Defeito</option>
			<option value="troca">Troca/Devolução</option>
			<option value="entrega">Tempo de Entrega</option>
			<option value="outros">Outros</option>
			</select> 			
			</li>
			
			<li>
			<textarea cols="28" rows="5" for="recado" id="recado" name="recado" required placeholder="Deixei Seu Recado Aqui..."></textarea>
			</li>
		
						
			<li>
				<input type="submit" id="enviar" value="ENVIAR">
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