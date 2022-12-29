<?php
session_start();

if(isset($_POST['login'])){

    include('..\conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];


        // $sql_code = 'SELECT * FROM conta_estudante, conta_psicologo WHERE email_estud = "'.$email.'", email_psic = "'.$email.'" and senha_estud = "'.sha1($senha).'", senha_psic = "'.sha1($senha).'";';

        $sql_code = 'SELECT * FROM contas WHERE email = "'.$email.'" AND senha = "'.sha1($senha).'";';
        $sql_exec = mysqli_query($conexao, $sql_code);
        $sql_result = mysqli_fetch_array($sql_exec);
        $linhas = mysqli_num_rows($sql_exec);

        if($linhas > 0) {
            $_SESSION['id'] = $sql_result['id'];
            ?>
            <div id="center-poggers">
            <div id="deletar-conta">
                <form style="margin-top: 
                40%;" id="deletar" name="botoes" action="#" method="POST">
                <h1 id="deletar-titulo" id="deletar-centro">Estamos preparando tudo para você! <br> <br>
                    <div class="lds-ripple"><div></div><div></div></div>
                </form> 
            </div>
        </div>
        <div id="deletar-blur">');
            <script>function DezSegundos(){

             location.replace("../index.php");
}
            setTimeout(DezSegundos, 1000*3);</script>
<?php
        }else{
            echo ('<script>window.alert("Não conseguiu logar!");window.location="#";</script>');
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
</head>
<body style="background-color:white; background-image: url('../imgs/bg_cadas.svg');   background-position: center; background-repeat: no-repeat; background-size: cover; bottom: 0px; background-attachment:fixed; background-position:center bottom;">
    <section class="limiter">
    <section class="container-login100">
        <section class="wrap-login100">
            <form name="loginf" class="login100-form validate-form" method="POST">
                <section style="padding-bottom: 50px;">
                    <a href="Cadastro_estudante.php"    id="estudante">Estudante</a>
                    <a href="Cadastro_psicologo.php"    id="psicologo">Psicologo</a>
                </section>
                    <span class="login100-form-title ">
					    Login
				    </span>
                    <section class="wrap-input100 validate-input paddingb" data-validate = "Email é necessario">
                        <span class="label-input100">E-mail</span>
                        <input class="input100" type="text" name="email" placeholder="email@email">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </section>
                    
                    <section class="wrap-input100 validate-input paddingb" data-validate="Password é necessario">
                        <span class="label-input100">Senha</span>
                        <input class="input100" type="password" name="senha" placeholder="********" class="form_input">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
                    </section>

					<section class="container-login100-form-btn">
						<section class="wrap-login100-form-btn">
							<section class="login100-form-bgbtn"></section>
							<button type="submit" name="login" class="login100-form-btn">
								Login
							</button>
						</section>
					</section>
                    
					<section class="cadastro-alternar">
						<span id="texto1">
							Não possui conta?
						</span>

						<a href="Cadastro_estudante.php" id="texto2">
							Crie uma
						</a>
					</section>
            </form>
            </section>
        </section>
    </section>

    
</body>
</html>