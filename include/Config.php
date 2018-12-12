<?php

	session_start();
	
	error_reporting();
	
	date_default_timezone_set('America/Sao_Paulo');
	
	//Definindo todas as exibições em utf-8
	header("Content-type: text/html; charset=utf-8");
	
	require_once('../model/DB.php');
	require_once('Functions.php');
	require_once('../model/Usuario.php');
	require_once("../model/Login.php");
	require_once("../model/Secao.php");
	require_once("../model/Forum.php");
	require_once("../model/Topico.php");
	require_once("../model/Post.php");
	require_once("../model/Comentario.php");
	
	// ========== Conexão com o Banco de Dados ================
	$db = new DB();
	
?>