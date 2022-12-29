<!DOCTYPE html>
<html>
<head>
	<title>Chat 1</title>
	<link rel="stylesheet" href="../assets/reset.css">
	<link rel="stylesheet" href="../assets/syle.css">
	<link rel="stylesheet" href="../assets/chat.css">
	<link rel="icon" type="image/x-icon" href="../imgs/logo-white.png">
	<script type="text/javascript">
        function ajax(){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200){
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'chat4.php', true);
            req.send();
        }
        setInterval(function(){ajax();}, 1000);
    </script>


</head>
<body>
<div id="chat">
	 

	<?php 
	session_start();
	include('..\conexao.php');
	include("header.php");
	include('..\verifica_login.php');
	
	?>

	<section class="container-page">
		<section class="container-chats">
			<section class="lista-desordenada">
			<ul>
				<li><a href="chat1.php"><button><span><img class="icon-invert" src="../imgs/regras.png"></span> &nbsp; Regras</button></a></li>
				<li><a href="chat2.php"><button><span><img class="icon-invert" src="../imgs/fone.png"></span> &nbsp; Comunicados</button></a></li>
				<li><a href="chat3.php"><button><span><img class="icon-invert" src="../imgs/hashtag.png"></span> &nbsp; Geral</button></a></li>
				<li><a href="chat4.php"><button style="background-color: #696969; padding-top: 15px;
    padding-bottom: 15px;"><span><img class="icon-invert" src="../imgs/hashtag.png"></span> &nbsp; Conversa 1</button></a></li>
				<li><a href="chat5.php"><button><span><img class="icon-invert" src="../imgs/hashtag.png"></span> &nbsp; Conversa 2</button></a></li>
				<li><a href="chat6.php"><button><span><img class="icon-invert" src="../imgs/hashtag.png"></span> &nbsp; Conversa 3</button></a></li>
			</ul>
			</section>
		</section>

	<form name="conversa" class="chat-painel">

	<?php

			$sqlacc = "SELECT * FROM contas INNER JOIN fotos ON contas.id = fotos.id_fotos Where id= ". $_SESSION['id'] .";";
		    $sql_exec = mysqli_query($conexao, $sqlacc);
		    $sql_result = mysqli_fetch_array($sql_exec);

		    $_SESSION['banimento'] = $sql_result['banimento'];
			$_SESSION['nivel_acesso'] = $sql_result['nivel_acesso'];
			$_SESSION['nova_foto'] = $sql_result['nome_fotos']; //zac@gmail.com_perfil_img

			if ($_SESSION['banimento'] == 1) {
				header('Location:banido.php');
			}else {

		    $dir = "..\imagens/";
		    $nome_fotos = $sql_result['nome_fotos'];
			$id_user = $sql_result['id'];

			$_SESSION['email'] = $sql_result['email'];

			echo ('<table><tr><td></td></tr>'); //correto acima

        	$sql_code = 'SELECT * FROM chat4 WHERE id_mensagem ORDER BY id_mensagem ASC;';
        	$sql_exec = mysqli_query($conexao, $sql_code);
        	$sql_result = mysqli_fetch_array($sql_exec);

			while ($con = mysqli_fetch_array($sql_exec)){
				$nova_foto = $con['fk_nome_fotos'];
				
			//a linha abaixo puxa a foto de quem mandou a mensagem abaixo e mansagem
			echo('<tr><td rowspan="2">'.'<img src="'.$dir.$nova_foto.'">'.'</td><td class="chat-nome">'.$con['fk_nickname'].'</td></tr><tr><td class="chat-mensagem">'.$con['mensagem'].'</td></tr>'); 			
			}

			echo ('</table>');

		if (isset($_POST['enviar'])) {

		   $sqlacc = "SELECT * FROM contas INNER JOIN fotos ON contas.id = fotos.id_fotos Where id= ". $_SESSION['id'] .";";
		    $sql_exec = mysqli_query($conexao, $sqlacc);
		    $sql_result = mysqli_fetch_array($sql_exec);

		    $dir = "..\imagens/";
		    $nome_fotos = $sql_result['nome_fotos'];
		    $nickname = $sql_result['nickname'];
			$id_user = $sql_result['id'];

			$_SESSION['email'] = $sql_result['email'];
			
    		// Recupera os dados dos campos
			$mensagens = $_POST['mensagem'];
			$_SESSION['nome'] = $sql_result['nome'];
			$_SESSION['nivel_acesso'] = $sql_result['nivel_acesso'];
			// if($_SESSION['nivel_acesso'] < 2){
			// 	 echo ('<script>window.alert("Somente admnstradores podem enviar mensagens nesse chat!");window.location="chat1.php#page-end";</script>');
			// }else{

			$sqlcad = 'insert into chat4(mensagem, chat, fk_id, fk_nome_fotos, fk_nickname) values ("'.$mensagens.'", "chat 1", "'.$id_user.'", "'.$nome_fotos.'","'.$nickname.'");';
            $sql_exec = mysqli_query($conexao, $sqlcad);

        	/*Foto de perfil e nome de perfil */
        	echo ('<table><tr><td></td></tr>'); //correto acima
        	
        	$sql_code = 'SELECT * FROM chat4 WHERE id_mensagem ORDER BY id_mensagem ASC;';
        	$sql_exec = mysqli_query($conexao, $sql_code);
        	$sql_result = mysqli_fetch_array($sql_exec);
        	$linhas = mysqli_num_rows($sql_exec);

			while ($con = mysqli_fetch_array($sql_exec)){

			$nova_foto = $con['fk_nome_fotos'];
			

			if($linhas < 10){
				header("Location:chat4.php");
			}
			

			echo('<tr><td rowspan="2">'.'<img src="'.$dir.$nova_foto.'">'.'</td><td class="chat-nome">'.$con['fk_nickname'].'</td></tr><tr><td class="chat-mensagem">'.$con['mensagem'].'</td></tr>'); 			
			}

			echo ('</table>');
			
		
	}

	?>
			<p id="page-end"></p>
			
<?php echo "</div>"; ?>
	
	</form>
		<form name="mensagens" action="#page-end" method="POST" class="chat-escrever">
			<section id="enviar-mensagem">
				<input type="text" name="mensagem" placeholder="Escreva alguma mensagem aqui!" maxlength="255" required="">
				<input id="send" type="submit" name="enviar" src="https://cdn-icons-png.flaticon.com/512/3917/3917754.png"></img>
			</section>
		</form>	
	</section>
</body>
</html>
<?php 
}
?>