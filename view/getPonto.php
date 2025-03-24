<?php
session_start();  // Inicia a sessão

// Verifique se a variável de sessão do professor está definida
if (!isset($_SESSION['id_professor'])) {
    echo json_encode(['error' => 'Professor não logado.']);
    exit();  // Para a execução do código caso o professor não esteja logado
}

// Se chegou até aqui, o professor está logado
require '../app/controller/time.php';

$time = new Times_torneio();
$pontos = $time->getPontos();  // Certifique-se de que o método getPontos retorna um array ou objeto

// Retorne a resposta no formato JSON
echo json_encode($pontos);
?>
