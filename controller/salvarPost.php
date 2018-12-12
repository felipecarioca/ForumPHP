<?php
    require_once('../include/Config.php');

    $post = new Post();
    
    $post->setTexto($_POST['texto']);
    $post->setIdTopico($_POST['id_topico']);

    $post->Salvar();
?>

<script type="text/javascript">
    loadByAjax('conteudo-principal', 'posts.php?topico=<?=$_POST['id_topico']?>');
</script>