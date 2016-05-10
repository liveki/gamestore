<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar</title>
	<link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<?php
require_once('classe.php');
$email = $_POST['email'];
$id = Cliente::pegarId($email);
$usuario = Cliente::getUsuario($id->getId());
session_start();
session_name('adm');
$_SESSION['dados'] = $usuario;
?>


			<a href="lista_usuarios.php"><button id="voltarVis"> Voltar</button></a>
	 <form id="formVisualizar" action="alterando.php" method="post">
			<table>
			<tr>
				<td><label for="nome">Nome:</label></td>
				<td><input type="text" id="nome" name="nome" value="<?php echo $usuario->getNome(); ?>" required placeholder='Informe seu Nome'  /></td>
			</tr>
				
			<tr>
				<td><label for="data">Data de Nascimento:</label></td>
				<td><input type="text" id="data" 
				name="data" required value="<?php echo $usuario->getDatNasc(); ?>" placeholder='Informe sua Data de Nascimento'  /></td>
			</tr>
			<tr>
				<td><label for="email1">E-mail Atual:</label></td>
				<td><input type="email" id="email"
				name="email" value="<?php echo $usuario->getEmail(); ?>" readonly required  placeholder="Informe seu novo e-mail" value="<?php  ?>"></td>
			</tr>			
			
			<tr>
				<td><label for="email1">E-mail Novo:</label></td>
				<td><input type="email" id="email1"
				name="email1"   placeholder="Informe seu novo e-mail" value="<?php  ?>"></td>
			</tr>
			
			<tr>
				<td><label for="email2">Repete E-mail:</label></td>
				<td><input type="email" id="email2" 
				name="email2"   placeholder="Repita o novo e-mail"></td>
			</tr>
								
			<tr>			
				<td><label for="password1">Nova Senha:</label></td>
				<td><input type="password" id="password1" 
				name="password1"   placeholder="Informe Sua Nova Senha"></td>
			</tr>
					
			<tr>
				<td><label for="password2">Repete Senha:</label></td>
				<td><input type="password" id="password2" 
				name="password2"  placeholder="Repita Sua Nova Senha"></td>
			</tr>
										
			<tr>
				<td><label for="sexo">Sexo:</label></td>
				<td><select type="text" id="sexo" name="sexo" required>
					<option value="masculino">Masculino</option>
					<option value="feminino">Feminino</option>
				</select></td>
			</tr>
				
				
			<tr>
				<td><label for="estadocivil">Estado Civil:</label></td>
				<td><select type="text" id="estadocivil" name="estadocivil" required>
					<option value="Solteiro(a)">Solteiro(a)</option>
					<option value="Casado(a)">Casado(a)</option>
					<option value="Separado(a)">Separado(a)</option>
					<option value="Divorciado(a)">Divorciado(a)</option>
					<option value="Viuvo(a)">Viúvo(a)</option>
				</select></td>
			</tr>
				
			<tr>
				<td><label for="rg">Registro Geral:</label></td>
				<td><input type="text" id="rg" name="rg" value="<?php echo $usuario->getRg(); ?>" required  placeholder="Informe Seu RG" ></td>
			</tr>
				
			<tr>
				<td><label for="cpf">CPF:</label></td>
				<td><input type="text" name="cpf" id="cpf" value="<?php echo $usuario->getCpf(); ?>" placeholder="Informe seu CPF" onBlur="ValidarCPF(form1.cpf)" /></td>
			</tr>
							
			<tr>
				<td><label for="telefone">Telefone:</label></td>
				<td><input type="text" name="telefone" value="<?php echo $usuario->getTelefone(); ?>" required id="telefone"  maxlength="15" placeholder="Informe Seu Telefone" /></td>
			</tr>
			
			<tr>
				<td><label for="cep">CEP:</label></td>
				<td><input id="cep" name="cep" required value="<?php echo $usuario->getCep(); ?>" type="text" maxlength="9" placeholder="Informe o CEP" onblur="getEndereco()"  /></td>
			</tr>
			
			<tr>
				<td><label for="rua">Rua:</label></td>
				<span class="add-on"></span>
				<td><input id="rua" name="rua" value="<?php echo $usuario->getRua(); ?>" required type="text" placeholder="Nome da Rua / Logradouro" /></td>
			</tr>
			
			<tr>
				<td><label for="num">Nº:</label></td>
				<span class="add-on"></span>
				<td><input id="numero" name="num" value="<?php echo $usuario->getNumero(); ?>" required type="text" placeholder="Número"  /></td>
			</tr>
			
			<tr>
				<td><label for="bairro">Bairro:</label></td>
				<span class="add-on"></span>
				<td><input id="bairro" name="bairro" value="<?php echo $usuario->getBairro(); ?>" required type="text" placeholder="Informe o Bairro" /></td>
			</tr>

			<tr>
				<td><label for="cidade">Cidade:</label></td>
				<span class="add-on"></span>
				<td><input id="cidade" name="cidade" value="<?php echo $usuario->getCidade(); ?>" required type="text" placeholder="Informe a Cidade" /></td>
			</tr>
						
			<tr>
				<td><label for="estado">Estado:</label></td>
				<span class="add-on"></span>
				<td><input id="estado" name="estado" value="<?php echo $usuario->getEstado(); ?>" required type="text" placeholder="Informe a UF" /></td>
			</tr>
			</table>
			<input type="submit" id="enviar" value="ALTERAR" name="type">
			<input type="Reset" id="limpar" value="LIMPAR" > 
    </form>

			
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
var sexo = "<?php echo $usuario->getSexo(); ?>";
var estCivil = "<?php echo $usuario->getEstCivil(); ?>";
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