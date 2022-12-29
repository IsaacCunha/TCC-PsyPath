<?php

	$conexao = mysqli_connect("localhost:3306", "root", "", "psypath") or die ("Ocorreu uma falha na conexão". mysqli_error());
	mysqli_set_charset($conexao,'utf8');
		//if($conexao) echo "A Conexão com o banco foi um sucesso!";
?>