<?php 
	session_start();
	include('..\conexao.php');
	include('..\verifica_login.php');

	$sqlacc = "SELECT * FROM contas Where id= ". $_SESSION['id'] .";";
	$sql_exec = mysqli_query($conexao, $sqlacc);
	$sql_result = mysqli_fetch_array($sql_exec);
	$_SESSION['banimento'] = $sql_result['banimento'];
	$_SESSION['nivel_acesso'] = $sql_result['nivel_acesso'];

	if ($_SESSION['nivel_acesso'] < 2) {
		header('location:perfil.php');
	}
			


?>

<!DOCTYPE html>
<html>
<head>
	<title>Gerenciar contas</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/reset.css">
	<link rel="stylesheet" href="../assets/syle.css">
	<link rel="stylesheet" href="../assets/gerenciar.css">
	<link rel="stylesheet" href="../assets/perfil.css">
	<link rel="stylesheet" href="../assets/cadastro_edit.css">
	<link rel="icon" type="image/x-icon" href="../imgs/logo-white.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Pacifico&display=swap" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../imgs/logo-white.png">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body style="background-color: #36393F;">
<?php
	include("header.php");
?>

<?php

		  	if(isset($_GET['alt'])){

				$cod = $_GET['alt'];
				$sql = 'SELECT * FROM contas WHERE id='.$cod.';';
				$resul = mysqli_query($conexao, $sql);
				$con = mysqli_fetch_array($resul);

		  ?>
	<section class="limiter">
		<section class="container-login100" style="position: fixed; z-index: 999">
			<section class="wrap-login100">   		
					<form name="alter" class="login100-form validate-form" action="#" method="POST">
						<span class="login100-form-title ">
							Editar perfil:
						</span>	

						<section class="wrap-input100 validate-input paddingb" data-validate = "ID é necessario">
							<span class="label-input100">ID:</span>
							<input type="number" class="input100" placeholder="ID" name="cod" value="<?php echo $con['id'];?>" readonly>
							<span class="focus-input100" data-symbol="&#xf206;"></span>
						</section>

						<section class="wrap-input100 validate-input paddingb" data-validate = "ID é necessario">
							<span class="label-input100">Nome:</span>
							<input  type="text" class="input100" name="nome" value="<?php echo $con['nome'];?>">
							<span class="focus-input100" data-symbol="&#xf206;"></span>
						</section>

						<section class="wrap-input100 validate-input paddingb" data-validate = "ID é necessario">
							<span class="label-input100">Apelido:</span>
							<input  type="text" class="input100" name="nickname" value="<?php echo $con['nickname'];?>">
							<span class="focus-input100" data-symbol="&#xf1db;"></span>
						</section>

						<section class="wrap-input100 validate-input paddingb" data-validate = "ID é necessario">
							<span class="label-input100">Email:</span>
							<input type="text" class="input100" name="email" value="<?php echo $con['email'];?>">
							<span class="focus-input100" data-symbol="&#xf15a;"></span>
						</section>

						<section class="wrap-input100 validate-input paddingb" data-validate = "ID é necessario">
							<span class="label-input100">Descrição:</span>
							<input type="text" class="input100" name="descricao" value="<?php echo $con['descricao'];?>">
							<span class="focus-input100" data-symbol="&#xf1d6;"></span>
						</section>
						
						<section class="wrap-input100 validate-input paddingb" data-validate = "ID é necessario">
							<span class="label-input100">Nivel de acesso:</span>
							<input type="number" class="input100" name="nivel_acesso" maxlength="1" min="0" max="2" value="<?php echo $con['nivel_acesso'];?>"> 
							<span class="focus-input100" data-symbol="&#xf190;"></span>
						</section>	
						<section class="wrap-login100-form-btn">
							<section class="login100-form-bgbtn"></section>
							<button type="submit" class="login100-form-btn" name="confirmar">
								Confirmar
							</button>
						</section>
			</form>
		</section>
	</section>
</section>
		  

		  <?php
		   }

		   if(isset($_POST['confirmar'])){
		   	$cod = $_POST['cod'];
		   	$nome = $_POST['nome'];
		   	$nickname = $_POST['nickname'];
			$email = $_POST['email'];
			$descricao = $_POST['descricao'];
			$nivel_acesso = $_POST['nivel_acesso'];

			$sql = 'UPDATE contas SET nome="'.$nome.'", nickname="'.$nickname.'", email="'.$email.'", descricao="'.$descricao.'", nivel_acesso="'.$nivel_acesso.'" where id="'.$cod.'";';
			$sql2 = 'UPDATE grupos_conversa SET nickname="'.$nickname.'", email="'.$email.'", where id="'.$cod.'";';
			mysqli_query($conexao, $sql);
			mysqli_query($conexao, $sql2);
		?>
		<script> location.replace("gerenciar_contas.php"); </script>
		<?php 
		}
		?>

	<section id="space" style="padding-top: 25vh;">
		<form name="pesquisa" action="#" method="POST" id="gerenciar-pesquisa">
			<input class="inputtext" type="text" name="texto" placeholder="Pesquisar">

			<input style="display: none;" name="pesquisar" class="btn" type="submit" value="pesquisar">
			
			<input class="btn" type="image" onclick='document.form[0].submit();' value="pesquisar" src="https://cdn-icons-png.flaticon.com/512/3917/3917754.png">
		</form>
	</section>

		
		<?php

			if(isset($_POST['pesquisar'])){
				$pesq = $_POST['texto'];
				$sql = 'SELECT * FROM contas WHERE nome LIKE "'.$pesq.'%";';
		
			}else{
				$sql = 'select * from contas;';
			}
			$resul = mysqli_query($conexao, $sql);
			$linhas = mysqli_num_rows($resul);

			?>

			<?php
				echo '<p id="gerenciar-quantideregistros">Quantidade de Registros: '.$linhas;
			?>
				<table class="gerenciar-table">
					<tbody>

			<?php

			while ($con = mysqli_fetch_array($resul)){

				echo('
							<tr>
								<td>ID</td>
								<td>NOME</td>
								<td>EMAIL</td>
								<td>BANIR</td>
								<td>NIVEL DE ACESSO</td>
							</tr>
							<tr>
								<td>'.$con['id'].'</td>
								<td>'.$con['nome'].'</td>
								<td>'.$con['email'].'</td>
								<td><a href="gerenciar_contas.php?ex='.$con['id'].'"> <img src="../imgs/banir.png" alt="Banir" width="30px" height="30px"> </a></td>
								<td>'.$con['nivel_acesso'].'</td>
							</tr>
							<tr>
								<td>BANIMENTO</td>
								<td>NICKNAME</td>
								<td>DESCRIÇÃO</td>
								<td>DESBANIR</td>
								<td>GERENCIAR</td>
							</tr>
							<tr>
								<td>'.$con['banimento'].'</td>
								<td>'.$con['nickname'].'</td>
								<td>'.$con['descricao'].'</td>
								<td><a href="gerenciar_contas.php?desbanir='.$con['id'].'"> <img src="../imgs/desbanir.png" alt="Desbanir" width="30px" height="30px"> </a></td>
								<td><a href="gerenciar_contas.php?alt='.$con['id'].'"> <img src="../imgs/gerenciar.png" alt="gerenciar" width="25px" height="25px" filter: invert(1);> </a></td>
							</tr>

				');



				//echo('<tr><td>'.$con['id'].'</td><td>'.$con['nome'].'</td><td>'.$con['nickname'].'</td><td>'.$con['email'].'</td><td>'.$con['descricao'].'</td><td>'.$con['nivel_acesso'].'</td><td>'.$con['banimento'].'</td><td><a href="gerenciar_contas.php?ex='.$con['id'].'"> <img src="../imgs/banir.png" alt="Banir" width="30px" height="30px"> </a></td><td><a href="gerenciar_contas.php?desbanir='.$con['id'].'"> <img src="../imgs/desbanir.png" alt="Desbanir" width="30px" height="30px"> </a></td><td><a href="gerenciar_contas.php?alt='.$con['id'].'"> <img src="../imgs/gerenciar.png" alt="gerenciar" width="25px" height="25px"> </a></td></tr>'); 
			}
		
		?>
						</tbody>
					</table>
		<?php

			if(isset($_GET['ex'])){
				$ex = $_GET['ex'];
				$sqlexcluir = "SELECT * FROM contas Where id= ". $ex .";";
				$sql_exec = mysqli_query($conexao, $sqlexcluir);
				$sql_result = mysqli_fetch_array($sql_exec);

				if ($ex == $_SESSION['id']) {
					echo ('<script>window.alert("Acesso negado!\nO usuário é você mesmo!");window.location="gerenciar_contas.php";</script>');
				}else{
				
				if ($sql_result['nivel_acesso'] >= 2) {
					echo ('<script>window.alert("Acesso negado!\nO usuário é um ADIMNISTRADOR");window.location="gerenciar_contas.php";</script>');
				}else{

				$sql = 'UPDATE contas SET banimento= 1 where id="'.$ex.'";';
				mysqli_query($conexao, $sql);
				?>
				<script> location.replace("gerenciar_contas.php"); </script>
			<?php
			}
			}
		}
		?>

		<?php

			if(isset($_GET['desbanir'])){
				$desbanir = $_GET['desbanir'];
				$sqldesbanir = "SELECT * FROM contas Where id= ". $desbanir .";";
				$sql_exec = mysqli_query($conexao, $sqldesbanir);
				$sql_result = mysqli_fetch_array($sql_exec);

				if ($sql_result['nivel_acesso'] >= 2) {
					echo ('<script>window.alert("Acesso negado!\nO usuário é um ADIMNISTRADOR");window.location="gerenciar_contas.php";</script>');
				}else{

				$sql = 'UPDATE contas SET banimento= 0 where id="'.$desbanir.'";';
				mysqli_query($conexao, $sql);
				?>
				<script> location.replace("gerenciar_contas.php"); </script>
			<?php
			}
			}
		?>
</body>
</html>
<?php
?>

		