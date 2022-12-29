<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<link rel="stylesheet" href="../assets/reset.css">
	<link rel="stylesheet" href="../assets/syle.css">
	<link rel="stylesheet" href="../assets/header.css">
	<link rel="stylesheet" href="../assets/perfil.css">
</head>
<body>
	<section class="header-container">
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
		<a href="../Index.php"><img class="perfil-icon" src="../imgs/logo.png"></a>
		<a class="link-header a" href="../pages/doar.php"><p>Doar</p></a>
		<?php if(isset($_SESSION['id'])){ ?>
		<a class="link-header a" href="../pages/chat1.php#page-end"><p>Abrir Chat</p></a>
		<?php }?>
		<?php if(!isset($_SESSION['id'])){ ?>
			<a class="link-header a" href="../pages/login.php"><p>Logar-se</p></a>
		<?php }?>

		<?php if(!isset($_SESSION['id'])){ ?>
			<a class="link-header a" href="../pages/cadastro_estudante.php#page-end"><p>Cadastrar-se</p></a>
		<?php }?>

		<a class="perfil-icon" href="../pages/perfil.php"><?php if (isset($_SESSION['id'])){ echo "<img class='perfil-icon' src='../".$dir.$nova_foto."' class = perfil_img>";}else{echo "<img class='perfil-icon' src='https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png'>";}?></a>
	</section>
</body>
</html>