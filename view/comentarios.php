<?php
    require_once('../include/Config.php');
    require_once('../include/Seguranca.php');

    $post = new Post();
    $post->Find($_GET['post']);

    $comentario = new Comentario();
    $comentarios = $comentario->getAll($_GET['post']);
?>
    <div class="col-12" style="display: flex; box-sizing: border-box; color: white; background-color: #994C33; padding: 2rem;">
        <span style="vertical-align: middle;padding-top: 8px;"><?=count($comentarios)?> Comentários</span>
        <input type="button" name="addComentario" value="Adicionar Comentário" onclick="$('#comentariosPost<?=$post->getId()?>').css('display', 'block');" class="botao" style="margin-left: 10px;">
    </div>
<?
    foreach($comentarios as $indice => $c) {

        $usuario_comentario = new Usuario();
        $usuario_comentario->Find($c->getIdUsuario());
    ?>
        <div class="col-12" style="display: flex; box-sizing: border-box; color: white; background-color: <?=(($indice % 2) ? '#994C33' : '#b3664d')?>; padding: 2rem;">
            <div style="width: 20vh; text-align: center; margin-right: 3rem;">
                <img src="imagens/user.png" style="width: 8vh; margin: auto;">
                <div style="margin: auto;"><span><?=$usuario_comentario->getNome()?></span></div>
                <div style="margin: auto;"><span style="font-weight: normal;"><?=$c->getDataCadastro()?></span></div>
            </div>
            <div><?=nl2br($c->getTexto())?></div>
        </div>
    <?
    }
    ?>
    <div class="col-12" id="comentariosPost<?=$post->getId()?>" style="display: none; box-sizing: border-box; color: white; background-color: #994C33; padding: 2rem;">
        <form method="post" id="formComentario<?=$post->getId()?>">
            <input type="hidden" name="id_post" value="<?=$post->getId()?>">
            <label for="texto">Comentário...</label>
            <textarea name="texto" id="texto" class="campo-texto"></textarea>
        </form>
        <div style="text-align: right;">
            <input type="button" name="addComentario" value="Enviar" onclick="loadByAjax('comentarios<?=$post->getId()?>', '../controller/SalvarComentario.php?post=<?=$post->getId();?>', 'formComentario<?=$post->getId()?>');  $('#comentariosPost<?=$post->getId()?>').css('display', 'none');" class="botao">
        </div>
    </div>