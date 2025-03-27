<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}




// Verificar se o professor está logado
if (!isset($_SESSION['id_professor'])) {
    // Caso não esteja logado, redireciona para a página de login
    header('Location: ../login.php');
    exit();
}

require '../../app/controller/time.php';

$objUser = new Times_torneio();

// Buscar os times cadastrados pelo professor logado
$dados = $objUser->buscar('id_professor = '.$_SESSION['id_professor']); // Apenas os times do professor logado

// require './menuTimes.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times Cadastrados</title>
    <link rel="stylesheet" href="../../assets/time2.css">
    <script src="../../assets/times.js" defer></script>
</head>
<body>
<div class="containerOpacity">

    <div class="container containerTitle">
        <!-- o texto do times.js aparecerá com o efeito aqui -->
        <h3 id="text1" class="spnTitle"></h3>
    </div>





    <?php
    // Verifica se não há times e exibe uma mensagem
    if (empty($dados)) {
        echo "<p>Nenhum time encontrado.</p>";
    } else {
        echo '<div class="times-list">';
        
        // Loop para exibir os times
        foreach ($dados as $index => $time) {
            $hasImage = $index !== 0;  // O primeiro time não terá imagem
            echo '<div class="card-container">';
            
            // Cria o link para o questionário da equipe (envolve todo o card)
            if ($hasImage) {
                echo '<img src="../../assets/img/imgVS.png" alt="' . htmlspecialchars($time->nome) . '" class="card-image">';
            }
            echo '<a href="./questionario.php?id_time=' . $time->id . '" class="card-link">';
            
            // Se o time não for o primeiro, exibe a imagem
            
            echo '<div class="card">
                    <div class="card-int">
                        <div class="hello">' . htmlspecialchars($time->nome) . '</div>
                        <span class="hidden">Entrar</span>
                    </div>
                  </div>
                </a>';
            echo '</div>';
        }
        
        echo '</div>';
    }
    ?>
</div>


</body>
</html>