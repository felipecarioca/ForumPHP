<?php
    require_once('../include/Config.php');

    $topico = new Topico();
    
    $topico->setDescricao($_POST['descricao']);
    $topico->setIdForum($_POST['id_forum']);

    $topico->Salvar();
?>

<script type="text/javascript">
    loadByAjax('conteudo-principal', 'topicos.php?forum=<?=$_POST['id_forum']?>');
</script>