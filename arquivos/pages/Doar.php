<?php  
session_start();
include('../conexao.php');
	
		if(isset($_SESSION['id'])){

	$sqlacc = "SELECT * FROM contas Where id= ". $_SESSION['id'] .";";
	$sql_exec = mysqli_query($conexao, $sqlacc);
	$sql_result = mysqli_fetch_array($sql_exec);
	$_SESSION['banimento'] = $sql_result['banimento'];
	$_SESSION['nivel_acesso'] = $sql_result['nivel_acesso'];

	if ($_SESSION['banimento'] == 1) {
		header('Location:../pages/banido.php');
	}
	}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Doar</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/reset.css">
	<link rel="stylesheet" href="../assets/header.css">
    <link rel="stylesheet" href="../assets/doar.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="icon" type="image/x-icon" href="imgs/logo-white.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
<?php
    include('header.php');
?>
    <section class="doar-body">
        <section class="doar-imagem_container">
            <img class="doar-imagem_imagem"src="../imgs/donation.png">
        </section>
        <section class="doar-direita_container">
        <section class="doar-texto">
            <h1 id="doar-texto_titulo">Cansado dos anuncios?</h1>
            <p>Nós sabemos que anuncios podem ser chatos, mas eles são necessarios para mantermos o site. Porém, se você detesta eles tanto assim temos uma solução, por meio de uma doação simples podemos remover PERMANENTEMENTE os anuncios da sua conta.</p>
        </section>
            <section class="doar-card">
                <section class="doar-cardcontainer">
                    <h2 class="doar-cardcontainer_titulo"><span class="span">R$</span><span class="span2">10</span></h2>
                    <p class="doar-cardcontainer_texto">uma vez</p>
                    <button class="doar-cardcontainer_botao">DOAR AGORA</button>
                </section>           
                <section class="doar-cardcontainer">
                    <h2 class="doar-cardcontainer_titulo"><span class="span">R$</span>15</h2>
                    <p class="doar-cardcontainer_texto">uma vez</p>
                    <button class="doar-cardcontainer_botao">DOAR AGORA</button>
                </section>            
                <section class="doar-cardcontainer">
                    <h2 class="doar-cardcontainer_titulo"><span class="span">R$</span>20</h2>
                    <p class="doar-cardcontainer_texto">uma vez</p>
                    <button class="doar-cardcontainer_botao">DOAR AGORA</button>
                </section>
            </section>
        </section>
    </section>
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
</body>
</html>