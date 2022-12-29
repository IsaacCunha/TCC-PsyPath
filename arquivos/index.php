<?php  
session_start();
include('conexao.php');
	
		if(isset($_SESSION['id'])){

	$sqlacc = "SELECT * FROM contas Where id= ". $_SESSION['id'] .";";
	$sql_exec = mysqli_query($conexao, $sqlacc);
	$sql_result = mysqli_fetch_array($sql_exec);
	$_SESSION['banimento'] = $sql_result['banimento'];
	$_SESSION['nivel_acesso'] = $sql_result['nivel_acesso'];

	if ($_SESSION['banimento'] == 1) {
		header('Location:pages/banido.php');
	}
	}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/reset.css">
	<link rel="stylesheet" href="assets/syle.css">
	<link rel="stylesheet" href="assets/header.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="icon" type="image/x-icon" href="imgs/logo-white.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
<section class="quem-somos_background">
<header class="header-container">
		<?php
		if (isset($_SESSION['id'])){
			$sqlacc = "SELECT * FROM contas INNER JOIN fotos ON contas.id = fotos.id_fotos Where id= ". $_SESSION['id'] .";";
			$sql_exec = mysqli_query($conexao, $sqlacc);
			$sql_result = mysqli_fetch_array($sql_exec);
			$_SESSION['nome'] = $sql_result['nome'];
			$email = $sql_result['email'];
			$dir = "imagens/";
			$nova_foto = $sql_result['nome_fotos']; //zac@gmail.com_perfil_img
		}
		?>
		<a href="Index.php"><img class="perfil-icon" src="imgs/logo.png"></a>
		<a class="link-header a" href="pages/doar.php"><p>Doar</p></a>
		<?php if(isset($_SESSION['id'])){ ?>
		<a class="link-header a" href="pages/chat1.php#page-end"><p>Abrir Chat</p></a>
		<?php }?>
		<?php if(!isset($_SESSION['id'])){ ?>
			<a class="link-header a" href="pages/login.php"><p>Logar-se</p></a>
		<?php }?>

		<?php if(!isset($_SESSION['id'])){ ?>
			<a class="link-header a" href="pages/cadastro_estudante.php#page-end"><p>Cadastrar-se</p></a>
		<?php }?>

		<a class="perfil-icon" href="pages/perfil.php"><?php if (isset($_SESSION['id'])){ echo "<img class='perfil-icon' src=".$dir.$nova_foto." class = perfil_img>";}else{echo "<img class='perfil-icon' src='https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png'>";}?></a>
	</header>
    	<?php
			
			
			if (!isset($_SESSION['id'])){ //
		?>


	<section class="quem-somos" style="padding-top: 15vh;">
		<section class="quem-somos_texto">
			<span class="quem-somos_centro">

				<h1 class="index-titulo">Quem somos nós?</h1><br>

				<p class="index-fonte">Nos PsyPath entendemos que a saude mental hoje em dia não é tão acessivel para grande parte da população, por isso, viemos te ajudar a receber ajuda de melhor qualidade de maneira gratuita</p><br>
				<a href="pages/cadastro_estudante.php">
					<button class="btn"> Criar Conta</button>
				</a>
			</span>
		</section>
		<img src="imgs/psy-art.png" class="quem-somos_img">
	</section>	
		<?php 
			}
			if(isset($_SESSION['id'])){
		?>
	<section class="quem-somos" style="padding-top: 15vh;">
		<section class="quem-somos_texto">
			<span class="quem-somos_centro">
				<h1 class="index-titulo">O inicio de uma jornada</h1><br>
				<p class="index-fonte">Para começar a interagir com outras pessoas e construir boas relaçoões com a comunidade Psypath clique no botão abaixo</p><br>
				<a href="pages/chat1.php">
					<button class="btn"> Conversar
					</button>
				</a>
			</span>
		</section>
		<img src="imgs/Laudo.png" class="quem-somos_img">
	</section>
	<?php 
		}
	?>
	<br><br><br>

	<img src="imgs/wavegreen.svg" class="wave">

</section>
	<br><br>
	<section class="importancia index-fonte">
	<h1 class="importancia_titulo index-titulo" id="importancia-titulo_cor">Por que a ajuda psicológica é importante para o estudante?</h1>
			<section class="importancia_Exemplo1">
				<img src="imgs/Index_Icons/autoconfiança.png" class="Importancia-icons">
				<p class="texto-legal">Melhora a autoconfiança</p>
			</section>
			<section class="importancia_Exemplo2">
				<img src="imgs/Index_Icons/sociabilidade.png" class="Importancia-icons">
				<p class="texto-legal">Ajuda na sociabilidade</p>
			</section>
			<section class="importancia_Exemplo3">
				<img src="imgs/Index_Icons/inteligencia_emocional.png" class="Importancia-icons">
				<p class="texto-legal">Desenvolve a inteligencia emocional</p>
			</section>
			<section class="importancia_Exemplo4">
				<img src="imgs/Index_Icons/autocontrole.png" class="Importancia-icons">
				<p class="texto-legal">Trabalha o autocontrole</p>
			</section>
			<section class="importancia_Exemplo5">
				<img src="imgs/Index_Icons/Percepcoes.png" class="Importancia-icons">
				<p class="texto-legal">Novas Percepções</p>
			</section>
			<section class="importancia_Exemplo6">
				<img src="imgs/Index_Icons/Visão_social.png" class="Importancia-icons">
				<p class="texto-legal">Melhor visão social</p>	
		</section>
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	
	<img src="imgs/wavesgreen.svg" class="wave">
	
	<section class="index-ending">
		<?php 
			if (!isset($_SESSION['id'])){ //
		?>
		<section class="porque-grupo">
			<img src="imgs/grupo.png" class="porque-grupo_img">
			<section class="porque-grupo_texto">
				<section class="porque-grupo_centro">
					<h2 class="index-titulo">Por que a terapia em grupo?</h2><br>
					<p class="index-fonte">A terapia em grupo é um processo terapêutico do qual participam várias pessoas, geralmente, com um problema semelhante. Essa troca de experiências leva o paciente a perceber que, além de não ser o único que passa por uma situação tão difícil. Isso dá a ele mais segurança para lidar com as próprias dificuldades.</p>
				</section>
			</section>
		</section>
		<?php
			}
		?>
		<?php 
			if (isset($_SESSION['id'])){ //
		?>
		<section class="porque-grupo">
			<img src="imgs/remover_anuncios.png" class="porque-grupo_img">
			<section class="porque-grupo_texto">
				<section class="porque-grupo_centro">
					<h2 class="index-titulo">Cansado dos anúncios?</h2><br>
					<p class="index-fonte">PsyPath é gratuito, por isso nós temos anuncios no site, só que sabemos que as vezes eles incomodam. Por isso nós damos uma forma de remove-los por meio de doações.</p><br>

					<a href="pages/Doar.php">
						<button class="btn2"> Doar
						</button>
					</a>
				</section>
			</section>
		</section>
		<?php 
			}
		?>
	</section>
	<footer>
		<footer class="footer_container">
			<section class="footer">
					<section>
						<img src="imgs\logo.png" class="logo_footer primeira_coluna">
					</section>
					<section class="titulo-footer">
						<br><br>
						<h1 class="terceira_coluna index-titulo titulo-footer">Nossas Redes Sociais</h1><br>
						<a href="https://www.instagram.com/psypath_etec/">
							<img src="imgs\instagram.png" class="social_media segunda_coluna">
						</a>
						<a href="https://www.tiktok.com/@psypath_etec">
							<img src="imgs\tik-tok.png" class="social_media2 segunda_coluna">
						</a>
					</section>
					<section class="footer-quem-somos">
						<br><br>
						<h1 class="index-titulo terceira_coluna titulo-footer-quem-somos">Quem somos nós?</h1><br>
						<p class="terceira_coluna fonte_footer" ID="footer_TADALLA">Nós somos</p>
						<h3 id="footer-quem-somos_nome">Psypath</h3><br>
						<p class="terceira_coluna fonte_footer">E nosso objetivo é te ajudar no perigoso caminho da vida, estamos aqui juntos!</p>
					</section>
			</section>
		</footer>
	</footer>
</body>
</html>
