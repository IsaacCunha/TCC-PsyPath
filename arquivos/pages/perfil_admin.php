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

	if ($_SESSION['nivel_acesso'] < 2) {
	header('Location:perfil.php');
}

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
	<link rel="icon" type="image/x-icon" href="../imgs/logo-white.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
	<?php 
	include("../pages/header.php");
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
			</form>

			<button class="menu-lateral" onclick="location.href = 'gerenciar_contas.php';">Gerenciar</button>
			</form>

		</section>
	<section class="perfil-info">

	<section class="perfil-info_container">
	<section class="perfil-info_infos">
		<section class="divisao">
			<section class="div1">
				<p style="font-weight: bold;">Descrição do usuário:</p>
				<section class="perfil_information">
					<p id=""><?php echo($sql_result['descricao'])?></p>
				</section><br>

				<p class="">E-mail:</p>
				<section class="perfil_information">
						<p><?php echo($sql_result['email'])?></p>
				</section><br>
				<?php if ($_SESSION['nivel_acesso'] == 0){ ?>
					<p class="">Função:</p>
					<section class="perfil_information">
						<p>Estudante</p>
					</section><br>
				<?php } ?>
				<?php if ($_SESSION['nivel_acesso'] == 1){ ?>
					<p class="">CRM</p>
					<section class="perfil_information">
						<p><?php echo($sql_result['crm'])?></p>
					</section><br>
				<?php } if($_SESSION['nivel_acesso'] == 0){?>
						<p>Laudo Psicologico</p>
						<section class="">
					<form name="laudos" method="POST">
						<input type="submit" name="ler_laudo" value="Ler laudo">
					</form>

					<p><?php if(isset($_POST['ler_laudo'])){
						$pdf_dir = "..\laudos/";
						$novo_pdf = $email . "_laudo." . $ext2; 
					 //$dir.$nova_foto
						header('location:'.$pdf_dir.$email.'_laudo');
					}
					?></p>
				</section><br>
				<?php } if($_SESSION['nivel_acesso'] == 2){?>
						<p>Função:</p>
						<p  class="perfil_information">ADIMNISTRADOR:</p>
				<?php } ?>
			</section>


			<section class="div2">
				<p>Apelido:</p>
				<section class="perfil_information">
						<p><?php echo($sql_result['nickname'])?></p>
				</section><br>
				<p>CPF: </p> 
				<p class="perfil_information"><?php echo($sql_result['cpf']) ?></p>
				<?php if ($_SESSION['nivel_acesso'] == 1){ ?>
					<p class="">Universidade:</p>
					<section class="perfil_information">
						<p><?php echo($sql_result['universidade'])?></p>
					</section><br>
					<p class="">Função:</p>
					<section class="perfil_information">
						<p>Professor</p>
					</section><br>	
				<?php }?>
			</section>


		<?php if ($_SESSION['nivel_acesso'] == 1){ ?>

			<section class="">
					<p>Psicólogo</p>
			</section>
			<section class="">
					<p><?php echo($sql_result['crm'])?></p>
			</section>
		<?php } if($_SESSION['nivel_acesso'] == 0){?>
				<section class="">
					<form name="laudos" method="POST">
						<input type="submit" name="ler_laudo" value="Ler laudo">
					</form>

					<p><?php if(isset($_POST['ler_laudo'])){
						$pdf_dir = "..\laudos/";
						$novo_pdf = $email . "_laudo." . $ext2; 
					 //$dir.$nova_foto
						header('location:'.$pdf_dir.$email.'_laudo');
					}
					?></p>
				</section>
			<?php }?>
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
				<img src="../imgs\tik-tok.png" class="social_media segunda_coluna">
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