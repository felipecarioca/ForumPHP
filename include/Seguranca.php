<?php
	ob_start();
	
	if($_SESSION['user_data']['usuario'] == "" || $_SESSION['user_data']['senha'] == ""){
		//Mensagem de restrição para o usuário
		$_SESSION['loginError'] = "Área restrita para usuários logados!";
		carregaPagina("../view/index.php");
	}
?>