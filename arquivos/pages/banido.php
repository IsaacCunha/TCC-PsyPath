<?php 
session_start();
	include('..\conexao.php');
	
	$sqlacc = "SELECT * FROM contas Where id= ". $_SESSION['id'] .";";
	$sql_exec = mysqli_query($conexao, $sqlacc);
	$sql_result = mysqli_fetch_array($sql_exec);

	$_SESSION['banimento'] = $sql_result['banimento'];

	if ($_SESSION['banimento'] == 0) {
		header('location:../index.php');
	}

$sqlacc = "SELECT * FROM contas Where id= ". $_SESSION['id'] .";";
$sql_exec = mysqli_query($conexao, $sqlacc);
$sql_result = mysqli_fetch_array($sql_exec);
$_SESSION['nome'] = $sql_result['nome'];
$_SESSION['email'] = $sql_result['email'];
	//var_dump($sqlacc);
if (isset($_POST['deslogar'])){
	include('..\logout.php');
	header('Location:../index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Banido!</title>
	<link rel="stylesheet" href="../assets/reset.css">
	<link rel="stylesheet" href="../assets/syle.css">
	<link rel="stylesheet" href="../assets/perfil.css">
	<link rel="stylesheet" href="../assets/banido.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="icon" type="image/x-icon" href="imgs/logo-white.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
<section class="container-container">
	<section class="container-ban">
		<img src="../imgs/logo-white.png" class="banido-img"> </img>
		<h1 class="banido-titulo">Essa conta está BANIDA!</h1>
		<p class="banido-texto">Devido a alguma infração cometida dentro do web-site, sua conta acabou sendo banida, para mais informações entre em contato com nosso suporte.</p>
		<p id="banido-email">psypathproject@gmail.com</p>
	</section>
	<form class="botoes" name="botoes" action="#" method="POST">
		<input type="submit" name="deslogar" value="SAIR" class="botao-banido">
	</form>
</section>

</body>
</html>

<?php 
	if(isset($_POST['deslogar'])){
		header('location:logout.php');
	}
?>