<?php 
session_start();
include('..\conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/reset.css">
	<link rel="stylesheet" href="../assets/cadastro.css">
	<link rel="stylesheet" href="../assets/syle.css">
	<link rel="icon" type="image/x-icon" href="../imgs/logo-white.png">
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
<body style="background-color:white; background-image: url('../imgs/cadastro_psy.svg');   background-position: center; background-repeat: no-repeat; background-size: cover; bottom: 0px; background-attachment:fixed; background-position:center bottom;">
<section class="limiter">
    <section class="container-login100">
        <section class="wrap-login100">    
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro" class="login100-form validate-form" >
				<span class="login100-form-title ">
					Criar conta estudante
				</span>		
				<section style="padding-bottom: 50px;">
                    <a href="Cadastro_estudante.php"    id="estudante"><span id="selecionado">Estudante</span></a>
                    <a href="Cadastro_psicologo.php"    id="psicologo">Psicologo</a>
                </section>

			<?php 
		
			
			echo '<section class="wrap-input100 validate-input paddingb" data-validate = "Nome é necessario">
			<span class="label-input100">Nome</span>';


			if (isset($_SESSION["nome"])){
				echo '<input class="input100" type="text" name="nome" required="" placeholder="Digite seu nome" value="'.$_SESSION["nome"].'">';
			} else {
				echo '<input class="input100" placeholder="Digite seu nome" type="text" name="nome" value="">';
			}
			echo '<span class="focus-input100" data-symbol="&#xf206;"></span>
			</section>';

			echo '<section class="wrap-input100 validate-input paddingb" data-validate = "Apelido é necessario">
			<span class="label-input100">Apelido</span>';

			if (isset($_SESSION["nickname"])){
				echo '<input class="input100" type="text" name="nickname" required="" placeholder="Digite seu apelido" value="'.$_SESSION["nickname"].'">';
			} else {
				echo '<input class="input100" type="text" name="nickname" placeholder="Digite seu apelido" value="">';
			}

			echo '<span class="focus-input100" data-symbol="&#xf1db;"></span>
			</section>';

			echo '<section class="wrap-input100 validate-input paddingb" data-validate = "Email é necessario">
			<span class="label-input100">Email</span>';

			if (isset($_SESSION["email"])){
				echo '<input class="input100" type="text" name="email" required="" placeholder="Digite seu Email" value="'.$_SESSION["email"].'">';
			} else {
				echo '<input class="input100" type="text" name="email" placeholder="Digite seu Email" value="">';
			}

			echo '<span class="focus-input100" data-symbol="&#xf15a;"></span>
			</section>';
			?>


			<section class="wrap-input100 validate-input paddingb" data-validate = "Senha é necessario">
			<span class="label-input100">Senha</span>

			<input class="input100" type="password" placeholder="Digite sua senha" name="senha" required="" />
			<span class="focus-input100" data-symbol="&#xf190;"></span>
			</section>

			<?php
			echo '<section class="wrap-input100 validate-input paddingb" data-validate = "Descrição é necessario">
			<span class="label-input100">Descrição</span>';
			if (isset($_SESSION["descricao"])){
				echo '<input class="input100" type="text" name="descricao" placeholder="Digite uma desrição" required="" value="'.$_SESSION["descricao"].'">';
			} else {
				echo '<input class="input100" type="text" name="descricao" placeholder="Digite uma desrição" value="">';
			}
			echo '<span class="focus-input100" data-symbol="&#xf1d6;"></span>
			</section>';	
			?>
			<section class="wrap-input100 validate-input paddingb" data-validate = "CPF é necessario">
			<span class="label-input100">CPF</span>
			<input class="input100" type="text" placeholder="###.###.###-##"  minlength="14" maxlength="14" name="cpf" onkeypress="formatar_mascara(this,'###.###.###-##')" required="" />
			<span class="focus-input100" data-symbol="&#xf10d;"></span>
			</section>
			<section id="centroo"><h1>Adicionar foto de exibição:</h1></section><br>
		<section class="image-upload">
			<!--<input class="testepreview" type="file" name="foto" onchange="updatePreview(this, 'image-preview')"  /><br/><br/>-->

			<label>
			<div class="container">
			<img class="preview-image image" src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" id="image-preview">				
				<div class="overlay">
			    <div class="text">Inserir Icone</div>
			  </div>
			</div>	
			<input id="foto" class="testepreview" type="file" name="foto" onchange="updatePreview(this, 'image-preview')" style="display:none; " /><br/><br/>
			</label>

		</section>


<script type="text/javascript">
    function updatePreview(input, target) {
        let file = input.files[0];
        let reader = new FileReader();
        
        reader.readAsDataURL(file);
        reader.onload = function () {
            let img = document.getElementById(target);
            img.src = reader.result;
        }
    }
</script>
			Laudo psicológico:
			<input class="" type="file" name="pdf" /><br/><br/>		
			<section class="container-login100-form-btn">
				<section class="wrap-login100-form-btn">
					<section class="login100-form-bgbtn"></section>
					<button type="submit" class="login100-form-btn" name="Cadastrar">
						Cadastrar
					</button>
				</section>
			</section>
		</form>
			<section class="cadastro-alternar">
				<span id="texto1">
					Ja possui conta?
				</span>
				<a href="Login.php" id="texto2">
					Logar
				</a>
				<span id="texto1" style="text-align: center;">
					Ao cadastrar você está ciente e aceita as nossas <br><a href="" id="texto2">Regras Gerais</a>.
				</span>
			</section>
        </section>
        </section>
    </section>
</body>
</html>

<?php




include('..\conexao.php');

if(isset($_POST['Cadastrar'])){

	$nome = $_POST['nome'];
	$_SESSION['nome'] = $nome;

	$nickname = $_POST['nickname'];
	$_SESSION['nickname'] = $nickname;

	$email = $_POST['email'];
	$_SESSION['email'] = $email;

	$senha = sha1($_POST['senha']);
	$SalvarSenha = $_POST['senha'];
	
	$descricao = $_POST['descricao'];
	$_SESSION['descricao'] = $descricao;

	$cpf = $_POST['cpf'];
	$_SESSION['cpf'] = $cpf;

	$foto = $_FILES["foto"]; 
	$pdf = $_FILES["pdf"]; 

	if (empty($foto["name"])) {
		echo ('<script>window.alert("Insira uma imagem para perfil");window.location="cadastro_estudante.php";</script>');
	}else{ 
		if (empty($pdf["name"])) {
			echo ('<script>window.alert("Insira uma imagem para perfil");window.location="cadastro_estudante.php";</script>');
		}else{ 

			$sqlacc = "SELECT * FROM contas order by id desc;";
			$sql_exec = mysqli_query($conexao, $sqlacc);
			$sql_result = mysqli_fetch_array($sql_exec);

			$id = $sql_result['id'];
			$emailtab = $sql_result['email'];

			$dir = "..\imagens/";
			$foto = $_FILES['foto'];

			$pdf_dir = "..\laudos/";
			$pdf = $_FILES['pdf'];

            $fotoExtensao = explode(".", $foto['name']); //Exemplo .jpg
            $pdfExtensao = explode(".", $pdf['name']); //Exemplo .jpg
            $ext1 = $fotoExtensao[sizeof($fotoExtensao)-1]; //exemplo: jpg
            $ext2 = $pdfExtensao[sizeof($pdfExtensao)-1]; //exemplo: jpg
            $_SESSION['imagem'] = $dir;  
            $_SESSION['pdf'] = $pdf_dir;    

            $nova_foto = $email . "_perfil_img." . $ext1; 
            $novo_pdf = $email . "_laudo." . $ext2;

            $largura = 40000;
            // Altura máxima em pixels
            $altura = 40000;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 4000000;
            $error = array();

            if ($email == $emailtab) {
            	echo ('<script>window.alert("Email já cadastrado!");window.location="cadastro_estudante.php";</script>');
            }else{

             // Verifica se o arquivo é uma imagem
            	if(!preg_match("/^image\/(jpeg|jpeg|png|gif|bmp|jfif)$/", $foto["type"])){
            		echo ('<script>window.alert("Arquivo não é uma imagem");window.location="cadastro_estudante.php";</script>');
            	}else{


        // Pega as dimensões da imagem
            		$dimensoes = getimagesize($foto["tmp_name"]);

        // Verifica se a largura da imagem é maior que a largura permitida
            		if($dimensoes[0] > $largura) {
            			echo ('<script>window.alert("Largura precisa ser menor ou igual à '.$largura.'");window.location="cadastro_estudante.php";</script>');
            		}else{

        // Verifica se a altura da imagem é maior que a altura permitida
            			if($dimensoes[1] > $altura) {
            				echo ('<script>window.alert("Altura precisa ser menor ou igual à '.$altura.'");window.location="cadastro_estudante.php";</script>');
            			}else{

        // Verifica se o tamanho da imagem é maior que o tamanho permitido
            				if($foto["size"] > $tamanho) {
            					echo ('<script>window.alert("tamanho precisa ser menor ou igual à '.$tamanho.'");window.location="cadastro_estudante.php";</script>');
            				}else{
                            //validação de senha abaixo
            					if (strlen($SalvarSenha) < 8) {
            						echo ('<script>window.alert("senha deve conter no mínimo 8 digitos!");window.location="cadastro_estudante.php";</script>');
                            //validação de senha acima    
            					}else{
            						if (strlen($SalvarSenha) > 36) {
            							echo ('<script>window.alert("senha deve conter no máximo 36 digitos!");window.location="cadastro_estudante.php";</script>');
                            //validação de senha acima    
            						}else{

            							if (!preg_match('/[A-Za-z]/', $SalvarSenha) || !preg_match('/[0-9]/', $SalvarSenha)){
            								echo ('<script>window.alert("senha deve conter letras e números");window.location="cadastro_estudante.php";</script>');
            							}else{
            								if (preg_match('/[A-Za-z]/', $cpf)){
            									echo ('<script>window.alert("CPF só deve conter números");window.location="cadastro_estudante.php";</script>');
            								}else{


        // Se não houver nenhum erro
            									if ($dimensoes[0] <= $largura && $dimensoes[1] <= $altura && $foto["size"] <= $tamanho){

            										$sqlcad = 'insert into contas(nome, nickname, email, senha, descricao, cpf, nivel_acesso, banimento) values ("'.$nome.'", "'.$nickname.'", "'.$email.'", "'.$senha.'", "'.$descricao.'", "'.$cpf.'", 0, 0);';

            										$sql_exec = mysqli_query($conexao, $sqlcad);

                            // Pega extensão da imagem
            										preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext);
            										preg_match("/\.(pdf){1}$/i", $pdf["name"], $ext);
                            // Gera um nome único para a imagem
            										$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            										$nome_pdf = md5(uniqid(time())) . "." . $ext[1];
                            // Caminho de onde ficará a imagem
            										$caminho_imagem = "..\imagens/" . $nome_imagem;
            										$caminho_pdf = "..\laudos/" . $nome_pdf;
                            // Faz o upload da imagem para seu respectivo caminho*/

                            // Insere os dados no banco
            										$sql = 'INSERT INTO fotos(nome_fotos, data) VALUES ("'.$nova_foto.'", NOW());';
            										$sql_exec = mysqli_query($conexao, $sql);

            										$sql_pdf = 'INSERT INTO laudos(nome_laudos, data) VALUES ("'.$novo_pdf.'", NOW());';
            										$sql_exec = mysqli_query($conexao, $sql_pdf);

                            move_uploaded_file($foto['tmp_name'], $dir.$nova_foto); // Exemplo:  $dir.$nova_foto = imagens/Juam.png

                            move_uploaded_file($pdf['tmp_name'], $pdf_dir.$novo_pdf); // Exemplo:  $pdf_dir.$novo_pdf = laudos/fulano.pdf

                            

                            $nome = "";
                            $_SESSION['nome'] = $nome;

                            $nickname = "";
                            $_SESSION['nickname'] = $nickname;

                            $email = "";
                            $_SESSION['email'] = $email;
                            
                            $descricao = "";
                            $_SESSION['descricao'] = $descricao;

                            $cpf = "";
                            $_SESSION['cpf'] = $cpf;
                            echo ('<script>window.alert("Cadastrado com sucesso!");window.location="login.php";</script>');
                        }
                    } 
                }    
            }
        }
    }
}
}
}
}
}
}
}
?>