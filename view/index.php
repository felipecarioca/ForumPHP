<?php
    session_start();
    
    require_once('../include/Config.php');
    
    // Destrói as variáveis para caso o usuário volte para a página de login e tente novamente acessar qualquer parte do sistema.
    unset($_SESSION['user_data']);
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
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/functions.js"></script>
	</head>
	<body>
		<aside class="menu">
			<section>
                <div class="logo">
                    <a href="index.php"><img src="imagens/logo.png" alt="Fórum Blackout" title="Fórum Blackout"></a>
                </div>
                <form method="post" action="../controller/login.php" id="formLogin">
                    <div class="field">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario"  id="usuario" class="campo-texto">
                    </div>
                    <div class="field">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha"  id="senha" class="campo-texto">
                    </div>
                    <div style="text-align: right;" id="botaoLogar">
                        <input type="submit" name="logar" id="logar" class="botao" value="Entrar">
                    </div>
                </form>
                <p class="error-msg">
                    <?php
                        if(isset($_SESSION['loginError'])){
                            echo $_SESSION['loginError'];
                            unset($_SESSION['loginError']);
                        }
                    ?>
                </p>
            </section>
            <div class="rodape">
                <input type="submit" name="cadastrar" id="cadastrar" class="botao btn-logout" value="Aliste-se!">
            </div>
		</aside>

		<main>
			<section class="principal">
				
			</section>
		</main>
	</body>
</html>