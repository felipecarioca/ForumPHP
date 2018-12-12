<?php
    require_once('../include/Config.php');
    require_once('../include/Seguranca.php');

    $forum = new Forum();
    $forum->Find($_GET['forum']);

    $topico = new Topico();
    $topicos = $topico->getAll($_GET['forum']);
?>

<section class="conteudo">
    <div class="titulo">
        <h1>Adicionar Tópico</h1>
    </div>
    <form method="post" id="formTopico">
        <input type="hidden" name="id_forum" value="<?=$forum->getId()?>">
        <div class="formulario">
            <div class="col-4"></div>
            <div class="col-4" style="margin-top: 20px;">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="campo-texto">
            </div>
            <div class="col-4"></div>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <input type="button" name="salvar" value="Salvar" class="botao" onclick="loadByAjax('conteudo-principal', '../controller/salvarTopico.php', 'formTopico');">
            <input type="button" name="voltar" value="Voltar" class="botao" onclick="loadByAjax('conteudo-principal', 'topicos.php?forum=<?=$forum->getId()?>');">
        </div>
    </form>
</section>