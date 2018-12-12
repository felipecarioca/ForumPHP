<?php
    require_once('../include/Config.php');
    require_once('../include/Seguranca.php');
    
    $topico = new Topico();
    $topico->Find($_GET['topico']);

    $post = new Post();
    $posts = $post->getAll($_GET['topico']);
?>

<section class="conteudo">
    <div class="titulo">
        <h1>Adicionar Post</h1>
    </div>
    <form method="post" id="formPost">
        <input type="hidden" name="id_topico" value="<?=$topico->getId()?>">
        <div class="formulario">
            <div class="col-2"></div>
            <div class="col-8" style="margin-top: 20px;">
                <label for="texto">Texto</label>
                <textarea name="texto" id="texto" class="campo-texto texto"></textarea>
            </div>
            <div class="col-2"></div>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <input type="button" name="salvar" value="Salvar" class="botao" onclick="loadByAjax('conteudo-principal', '../controller/salvarPost.php', 'formPost');">
            <input type="button" name="voltar" value="Voltar" class="botao" onclick="loadByAjax('conteudo-principal', 'posts.php?topico=<?=$topico->getId()?>');">
        </div>
    </form>
</section>