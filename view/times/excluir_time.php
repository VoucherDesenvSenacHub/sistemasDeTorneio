<?php

require '../../app/controller/time.php';

if (isset($_GET['id_time'])) {
    $id = $_GET['id_time'];

    // Cria um objeto da classe Times_torneio
    $objUser = new Times_torneio();

    // Chama o método buscar_por_id e recupera o time
    $desc_delete = $objUser->buscar_por_id($id);

    // Agora chama o método excluirTime passando o ID
    $del = $objUser->excluirTime($id);

    if ($del) {
        header('Location: ./listar_time.php');
        exit();
    } else {
        echo "Erro ao excluir o time.";
    }
}
