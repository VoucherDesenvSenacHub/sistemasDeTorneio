<?php
session_start(); // Inicia a sessão

// Verifica se a sessão do usuário está ativa
if (isset($_SESSION['id_professor'])) {
    session_unset(); // Limpa todas as variáveis de sessão
    session_destroy(); // Destroi a sessão
    header('Location: ../index.php'); // Redireciona para a página de login
    exit(); // Interrompe a execução do script
} else {
    // Caso o usuário não esteja logado, redireciona diretamente para o login
    header('Location: ../index.php');
    exit();
}
?>
