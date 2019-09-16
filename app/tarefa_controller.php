<?php 

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    require "../app/tarefa.model.php";
    require "../app/tarefa.service.php";
    require "../app/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
        $tarefa = new Tarefa();

        $tarefa->__set("tarefa", $_POST["tarefa"]);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();

        header("location: nova_tarefa.php?inclusao=1");
    } else if ($acao == "recuperar"){
        $conexao = new Conexao();
        $tarefa = new Tarefa();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
    } else if ($acao == "atualizar") {
        $conexao = new Conexao();
        $tarefa = new Tarefa();
        $tarefa->__set("id", $_POST['id']);
        $tarefa->__set("tarefa", $_POST['tarefa']);

        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefas = $tarefaService->atualizar()){
            header("location: todas_tarefas.php");
        }
    }
?>