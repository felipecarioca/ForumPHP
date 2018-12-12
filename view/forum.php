<?php

    require_once('../include/Config.php');
    require_once('../include/Seguranca.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Fórum Blackout | Tudo sobre o game</title>
        <meta name="description" content="Login | CPW SYSTEM">
        <meta name="author" content="Felipe Pereira">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" href="imagens/icon.ico">
        <link rel="stylesheet" type="text/css" href="css/default.css">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/functions.js"></script>
	</head>
	<body>
		<aside class="menu">
			<section>
                <div class="logo">
                    <a href="forum.php"><img src="imagens/logo.png" alt="Fórum Blackout" title="Fórum Blackout"></a>
                </div>
                <img src="imagens/specialist.png" alt="Especialista" title="Especialista" class="banner">
            </section>
            <div class="rodape">
                <a href="../controller/Logout.php"><input type="submit" name="sair" id="sair" class="botao btn-logout" value="Sair"></a>
            </div>
		</aside>

		<main id="conteudo-principal">
			<section class="conteudo">
                <div class="secao blackout" onclick="loadByAjax('conteudo-principal', 'topicos.php?forum=1');">
                    <span>BLACKOUT</span>
                </div>
                <div class="secao multiplayer" onclick="loadByAjax('conteudo-principal', 'topicos.php?forum=2');">
                    <span>MULTIPLAYER</span>
                </div>
                <div class="secao zombies" onclick="loadByAjax('conteudo-principal', 'topicos.php?forum=3');">
                    <span>ZOMBIES</span>
                </div>
			</section>
		</main>
	</body>
</html>