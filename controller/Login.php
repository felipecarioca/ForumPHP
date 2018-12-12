<?php

	session_start();
	require_once('../include/Config.php');
	
	/*
	$usuario = new Usuario();

	$usuario->setNome('Felipe Pereira');
	$usuario->setUsuario($_POST['usuario']);
	$usuario->setSenha(md5($_POST['senha']));

	$usuario->Salvar();
	*/

	$login = new Login();
	$login->Logar($_POST['usuario'], $_POST['senha']);
	
?>