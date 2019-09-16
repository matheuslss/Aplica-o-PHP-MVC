<?php 

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    require "../app/tarefa.model.php";
    require "../app/tarefa.service.php";
    require "../app/conexao.php";

    $tarefa = new Tarefa();

    $tarefa->__set("tarefa", $_POST["tarefa"]);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

    header("location: nova_tarefa.php?inclusao=1");
?>