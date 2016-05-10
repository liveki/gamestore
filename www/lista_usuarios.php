<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title> Index </title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<a href="secreta_adm.php"><button id="voltarLista"><text>Voltar</text></button></a>
<?php
require_once('classe.php');
$usuarios = Cliente::listaUsuario();
$i = 0;
foreach($usuarios as $usuario){
	if($usuario->getNivel() == 'Cliente'){
		?>
		<form id="usuario" method="post" action="vis_usuario.php">
			<label>Nome:</label>
			<input type="text"  id="noborder" readonly name="usuario" value="<?php echo $usuario->getNome(); ?>"/><br>
			<label>Email:</label>
			<input type="text" id="noborder" name="email" readonly value="<?php echo $usuario->getEmail(); ?>"/><br>
			<label>Nível:</label>
			<input type="text" id="noborder" name="nivel" readonly value="<?php echo $usuario->getNivel(); ?>"/>
			<input type="submit" value="Alterar" id="tornarAdm" />
			<a onClick="return confirm('Excluir este usuário?');" id="button1" 
			href="http://www.localhost/www/excluindo.php?user=<?php echo $usuario->getEmail(); ?>">Excluir</a>

			<a onClick="return confirm('Tornar este usuário administrador?');" id="button3" 
			href="http://www.localhost/www/alt_nivel.php?user=<?php echo $usuario->getEmail(); ?>">Tornar Adm</a>
		</form>
		
	<?php
	}else{ 
		?>
		<form id="usuario" method="post" action="vis_usuario.php">
			<label>Nome:</label>
			<input type="text" id="noborder" name="usuario" readonly value="<?php echo $usuario->getNome(); ?>"/><br>
			<label>E-mail:</label>
			<input type="text" id="noborder" name="email" readonly value="<?php echo $usuario->getEmail(); ?>"/><br>
			<label>Nível:</label>
			<input type="text" id="noborder" name="nivel" readonly value="<?php echo $usuario->getNivel(); ?>"/>
			<input type="submit" id="tornarAdm" value="Alterar" />
			<a onClick="return confirm('Excluir este usuário?');" id="button1" 
			href="http://www.localhost/www/excluindo.php?user=<?php echo $usuario->getEmail(); ?>">Excluir</a>

			<a onClick="return confirm('Tornar este usuário cliente?');" id="button2" 
			href="http://www.localhost/www/alt_nivel.php?user=<?php echo $usuario->getEmail(); ?>">Tornar Cliente</a>
		</form>
	<?php
	}
}
?>

	
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
function excluir(){
	if(confirm("Deseja mesmo excluir este usuário?")){
		window.location.href="http://www.localhost/www/excluindo.php?user=mail";
	}
}
</script>
</body>
</html>