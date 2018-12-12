<?php
    require_once('../include/Config.php');

    $comentario = new Comentario();
    
    $comentario->setTexto($_POST['texto']);
    $comentario->setIdPost($_POST['id_post']);

    $comentario->Salvar();

?>

<script type="text/javascript">
    loadByAjax('comentarios<?=$_POST['id_post']?>', '../view/comentarios.php?post=<?=$_POST['id_post']?>');
</script>