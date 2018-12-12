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
        <h1>Tópicos do Fórum <?=$forum->getSecao()->getDescricao();?></h1>
    </div>
    <div class="formulario">
        <?php
            foreach($topicos as $t) {

                $usuario = new Usuario();
                $usuario->Find($t->getIdUsuario());

                ?>
                <div class="col-4">
                    <div class="campo-formulario" style="cursor: pointer; display: flex;" onclick="loadByAjax('conteudo-principal', 'posts.php?topico=<?=$t->getId();?>');">
                        <img src="imagens/chat.png" style="height: 3rem; vertical-align: middle;">
                        <div style="padding-left: 10px;">
                            <div>
                                <span><?=$t->getDescricao()?></span>
                            </div>
                            <div>
                                <span style="font-weight: normal;"><?=$t->getDataCadastro()?> | <i><?=$usuario->getNome()?></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?
            }
        ?>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <input type="button" name="addTopico" value="Adicionar Tópico" onclick="loadByAjax('conteudo-principal', 'addTopico.php?forum=<?=$forum->getId();?>');" class="botao">
        <a href="forum.php"><input type="button" name="voltar" value="Voltar" class="botao"></a>
    </div>
</section>