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
        <h1><?=$topico->getDescricao()?></h1>
    </div>
    <div class="formulario" style="margin-top: 30px;">
        <?php
            foreach($posts as $p) {

                $usuario_post = new Usuario();
                $usuario_post->Find($p->getIdUsuario());

                $comentario = new Comentario();
                $comentarios = $comentario->getAll($p->getId());

                ?>
                <div style="width: 100%; margin-bottom: 30px;">
                    <div class="col-12" style="display: flex; box-sizing: border-box; background-color: #EBB916; padding: 2rem;">
                        <div style="width: 20vh; text-align: center; margin-right: 3rem;">
                            <img src="imagens/user.png" style="width: 15vh; margin: auto;">
                            <div style="margin: auto;"><span><?=$usuario_post->getNome()?></span></div>
                            <div style="margin: auto;"><span style="font-weight: normal;"><?=$p->getDataCadastro()?></span></div>
                        </div>
                        <div><?=nl2br($p->getTexto())?></div>
                    </div>
                    <div style="width: 100%" id="comentarios<?=$p->getId()?>">
                        <div class="col-12" style="display: flex; box-sizing: border-box; color: white; background-color: #994C33; padding: 2rem;">
                            <span style="vertical-align: middle;padding-top: 8px;"><?=count($comentarios)?> Comentários</span>
                            <input type="button" name="addComentario" value="Adicionar Comentário" onclick="$('#comentariosPost<?=$p->getId()?>').css('display', 'block');" class="botao" style="margin-left: 10px;">
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
                        <div class="col-12" id="comentariosPost<?=$p->getId()?>" style="display: none; box-sizing: border-box; color: white; background-color: #994C33; padding: 2rem;">
                            <form method="post" id="formComentario<?=$p->getId()?>">
                                <input type="hidden" name="id_post" value="<?=$p->getId()?>">
                                <label for="texto">Comentário...</label>
                                <textarea name="texto" id="texto" class="campo-texto"></textarea>
                            </form>
                            <div style="text-align: right;">
                                <input type="button" name="addComentario" value="Enviar" onclick="loadByAjax('comentarios<?=$p->getId()?>', '../controller/SalvarComentario.php?post=<?=$p->getId();?>', 'formComentario<?=$p->getId()?>');  $('#comentariosPost<?=$p->getId()?>').css('display', 'none');" class="botao">
                            </div>
                        </div>
                    </div>
                </div>
                <?
            }
        ?>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <input type="button" name="addPost" value="Adicionar Post" onclick="loadByAjax('conteudo-principal', 'addPost.php?topico=<?=$topico->getId();?>');" class="botao">
        <input type="button" name="addPost" value="Voltar" onclick="loadByAjax('conteudo-principal', 'topicos.php?forum=<?=$topico->getIdForum()?>');" class="botao">
    </div>
</section>