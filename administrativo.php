<?php
	session_start();
	echo "Usuario: ". $_SESSION['AdmNome'];	
?>
<br>
<a href="sair.php">Sair</a>