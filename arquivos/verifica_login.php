<?php
	if(!isset($_SESSION['id'])){
		header('Location:login.php?erro=true');
		exit;
	}

?>