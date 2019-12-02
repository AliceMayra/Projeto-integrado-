<?php
	session_start();
	
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['AdmNome'],
		$_SESSION['AdmEmail']
		
	);
	
	$_SESSION['logindeslogado'] = "Deslogado com sucesso";
	//redirecionar o usuario para a página de login
	header("Location: acessar.php");
?>