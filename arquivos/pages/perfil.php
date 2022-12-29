<?php 
session_start();
include('..\conexao.php');
include('..\verifica_login.php');

$sqlacc = "SELECT * FROM contas Where id= ". $_SESSION['id'] .";";
$sql_exec = mysqli_query($conexao, $sqlacc);
$sql_result = mysqli_fetch_array($sql_exec);

$_SESSION['banimento'] = $sql_result['banimento'];
$_SESSION['nivel_acesso'] = $sql_result['nivel_acesso'];

if ($_SESSION['banimento'] == 1) {
	header('Location:banido.php');
}else{

	if (isset($_POST['deletar_conta'])){ ?>
		<div id="center-poggers">
			<div id="deletar-conta">
				<form id="deletar" name="botoes" action="#" method="POST">
					<h1 id="deletar-titulo" id="deletar-centro"><?php echo('Olá '.$sql_result['nome']. ', ')?>Tem certeza que deseja <br> Deletar Sua Conta PERMANENTEMENTE?</h1><br><br>
					<div class="deletar-centro">
						<form name="botoes2" action="#" method="POST">
							<input type="submit" name="sim" value="sim" class="botao-deletar">
							<input type="submit" name="nao" value="não" class="botao-deletar">
						</form>
					</div>
				</form> 
			</div>
		</div>
		<div id="deletar-blur">');

	<?php
}
if(isset($_POST['sim'])){
	/* o bloco abaixo altera todas as mensagens do banco! 
	$sqlacc = 'UPDATE chat1 SET mensagem = "Esta mensagem deixou de existir pois o usuário foi deletado!" WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'UPDATE chat2 SET mensagem = "Esta mensagem deixou de existir pois o usuário foi deletado!" WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'UPDATE chat3 SET mensagem = "Esta mensagem deixou de existir pois o usuário foi deletado!" WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'UPDATE chat4 SET mensagem = "Esta mensagem deixou de existir pois o usuário foi deletado!" WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'UPDATE chat5 SET mensagem = "Esta mensagem deixou de existir pois o usuário foi deletado!" WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'UPDATE chat6 SET mensagem = "Esta mensagem deixou de existir pois o usuário foi deletado!" WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);
	fim do bloco */

	$sqlacc = 'DELETE FROM chat1 WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'DELETE FROM chat2 WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'DELETE FROM chat3 WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'DELETE FROM chat4 WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'DELETE FROM chat5 WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	$sqlacc = 'DELETE FROM chat6 WHERE fk_id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc); 

	$sqlacc = 'DELETE FROM contas WHERE id = "'.$_SESSION['id'].'";';
	mysqli_query($conexao, $sqlacc);

	echo ('<script>window.alert("Sua conta foi deletada com sucesso!");window.location="logout.php";</script>');
}
if(isset($_POST['nao'])){
	header('Location:perfil_admin.php');
}

$sqlacc = "SELECT * FROM contas INNER JOIN fotos ON contas.id = fotos.id_fotos Where id= ". $_SESSION['id'] .";";
$sql_exec = mysqli_query($conexao, $sqlacc);
$sql_result = mysqli_fetch_array($sql_exec);
$_SESSION['nome'] = $sql_result['nome'];
$_SESSION['email'] = $sql_result['email'];

if (isset($_POST['deslogar'])){
	include('logout.php');
	header('location:../index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/reset.css">
	<link rel="stylesheet" href="../assets/syle.css">
	<link rel="stylesheet" href="../assets/perfil.css">
	<link rel="stylesheet" href="../assets/cadastro_edit.css">
	<link rel="icon" type="image/x-icon" href="../imgs/logo-white.png">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<script type="text/javascript">
		function formatar_mascara(src, mascara) {
			var campo = src.value.length;
			var saida = mascara.substring(0,1);
			var texto = mascara.substring(campo);
			if(texto.substring(0,1) != saida) {
				src.value += texto.substring(0,1);
			}
		}
	</script>
</head>
<body>
	<?php 
	include("../pages/header.php");
	?>

<?php

if(isset($_POST['editar_perfil'])){

	$sql = 'SELECT * FROM contas WHERE id='.$_SESSION['id'].';';
	$resul = mysqli_query($conexao, $sql);
	$con = mysqli_fetch_array($resul);	
	?>
	<section class="limiter">
		<section class="container-login100" style="position: fixed;">
			<section class="wrap-login100">    
				<form name="alter" class="login100-form validate-form" action="#" method="POST" style="z-index: 200;" style="z-index: 5;">
					<span class="login100-form-title ">
						Editar conta
					</span>	

					<section class="wrap-input100 validate-input paddingb" data-validate = "Nome é necessario">
						<span class="label-input100">Mude o seu apelido</span>
							<input type="text" class="input100" placeholder="Digite seu nome" name="apelido" value="<?php echo $con['nickname'];?>">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</section>

					<section class="wrap-input100 validate-input paddingb" data-validate = "Nome é necessario">
						<span class="label-input100">Mude o seu email</span>
							<input type="text" class="input100" name="email" placeholder="Digite seu email" value="<?php echo $con['email'];?>">
						<span class="focus-input100" data-symbol="&#xf15a;"></span>
					</section>

					<section class="wrap-input100 validate-input paddingb" data-validate = "Nome é necessario">
						<span class="label-input100">Mude a sua descrição</span>
							<input type="text" class="input100" placeholder="Digite sua descrição" name="descricao" value="<?php echo $con['descricao'];?>">
						<span class="focus-input100" data-symbol="&#xf1d6;"></span>
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
	$apelido = $_POST['apelido'];
	$email = $_POST['email'];
	$descricao = $_POST['descricao'];

	

	$sql = 'UPDATE contas SET nickname="'.$apelido.'", email="'.$email.'", descricao="'.$descricao.'" where id="'.$_SESSION['id'].'";';

	mysqli_query($conexao, $sql);
	?>
	<script> location.replace("perfil.php"); </script>
	<?php 
}
?>



	<section class="perfil-container">
		<section class="perfil-card">
			<section class="perfil-menu">
				<?php

				$email = $sql_result['email'];
				$dir = "..\imagens/";
			$nova_foto = $sql_result['nome_fotos']; //zac@gmail.com_perfil_img

			echo "<img src=".$dir.$nova_foto." class = >";
			?>
			<h1 style="overflow: hidden; text-align:center;">Bem vindo, <?php echo($sql_result['nome'] )?></h1>
			<button class="menu-lateral" id="selecionado">Perfil</button>
			<form name="botoes" action="#" method="POST">
				<button type="submit" class="menu-lateral" name="deslogar">Deslogar</button>
			</form>
			<form name="botoes" action="#" method="POST">
				<button type="submit" class="menu-lateral" name="deletar_conta">Deletar Conta</button>
			</form>
			<form name="botoes" action="#" method="POST">
				<button type="submit" class="menu-lateral" name="editar_perfil">Editar perfil</button>
			</form>

			<?php 
				if ($_SESSION['nivel_acesso'] >= 2) {
			?>

				<button class="menu-lateral" onclick="location.href = 'gerenciar_contas.php';">Gerenciar</button>
			

		<?php } ?>
			<form name="botoes" action="#" method="POST">

			</section>
			<section class="perfil-info">

				<section class="perfil-info_container">
					<section class="perfil-info_infos">
						<section class="divisao">
							<section class="div1">
							<p style="font-weight: bold;">Informações:</p>
								<p>Apelido: </p>
								<section class="perfil_information">
									<p><?php echo($sql_result['nickname'])?></p>
								</section><br>
			
								<p class="">E-mail:</p>
								<section class="perfil_information">
									<p><?php echo($sql_result['email'])?></p>
								</section><br>


								<p>CPF: </p> 
								<p class="perfil_information"><?php echo($sql_result['cpf']) ?></p><br>

							</section>

							<section class="div2">
								<br>

								<p>Descrição: </p> 
								<section class="perfil_information">
									<p id=""><?php echo($sql_result['descricao'])?></p>
								</section><br>

								<?php if ($_SESSION['nivel_acesso'] == 0){ ?>
									<p class="">Função:</p>
									<section class="perfil_information">
										<p>Estudante</p>
									</section><br>
								<?php } ?>
								<?php if($_SESSION['nivel_acesso'] == 0){?>
									<p>Laudo Psicologico</p>
									<section class="perfil_information">
										<form class="nuttonf" name="laudos" method="POST">
											<input class="nutton" type="submit" name="ler_laudo" value="Ler laudo">
										</form>
									</section><br>
								<?php } if($_SESSION['nivel_acesso'] == 2){?>
									<p>Função:</p>
									<p  class="perfil_information">ADIMNISTRADOR</p>
								<?php } ?>

							<?php if ($_SESSION['nivel_acesso'] == 1){ ?>
									<p class="">Universidade:</p>
									<section class="perfil_information">
										<p><?php echo($sql_result['universidade'])?></p>
									</section><br>	
								<?php }?>

								<?php if ($_SESSION['nivel_acesso'] == 1){ ?>

									<?php } if($_SESSION['nivel_acesso'] == 0){?>
									<section class="">
										<?php if(isset($_POST['ler_laudo'])){
										
											$sqlacc = "SELECT * FROM contas INNER JOIN laudos ON contas.id = laudos.id_laudos Where id= ". $_SESSION['id'] .";";
											$sql_exec = mysqli_query($conexao, $sqlacc);
											$sql_result = mysqli_fetch_array($sql_exec);
											$pdf_dir = "../laudos/";
											$novo_pdf = $sql_result['nome_laudos']; 
									//$dir.$nova_foto
											header('location:'.$pdf_dir.$novo_pdf);
										}
										?>
									</section>
									<?php }?>
									<?php if ($_SESSION['nivel_acesso'] == 1){ ?>
									<p class="">Função:</p>
									<section class="perfil_information">
										<p>Psicólogo(a)</p>
									</section><br>	
								<?php }?>
								</section>
						</section>
					<?php } ?>
				</section>
			</section>
		</section>	
	</section>

</section>
</section>
<section style="padding-top: 10vh;">
<footer class="footer_container">
    <section class="footer">
		<section>
			<img src="../imgs\logo.png" class="logo_footer primeira_coluna">
		</section>
		<section class="titulo-footer">
			<br><br>
			<h1 class="terceira_coluna index-titulo titulo-footer">Nossas Redes Sociais</h1><br>
			<a href="https://www.instagram.com/psypath_etec/">
				<img src="../imgs\instagram.png" class="social_media segunda_coluna">
			</a>
			<a href="https://www.tiktok.com/@psypath_etec">
				<img src="../imgs\tik-tok.png" class="social_media2 segunda_coluna">
			</a>
		</section>	
		<section class="footer-quem-somos">
			<br><br>
			<h1 class="index-titulo terceira_coluna titulo-footer-quem-somos">Quem somos nós?</h1><br>
			<p class="terceira_coluna fonte_footer" ID="footer_TADALLA">Nós somos</p>
			<h3 id="footer-quem-somos_nome">Psypath</h3><br>
			<p class="terceira_coluna fonte_footer">E nosso objetivo é te ajudar no perigoso caminho da vida, estamos aqui juntos!</p>
		</section>
		</div>
	
    </section>
</footer>
</section>
</body>
</html>