<?php
	include_once('../include/Config.php');
	
	session_start();
	session_destroy();
	
	// Destrói as variáveis para caso o usuário volte para a página de login e tente novamente acessar qualquer parte do sistema.
	unset($_SESSION['user_data']);
	
	// Vai para a página inicial
	carregaPagina("../view/index.php");
	
?>