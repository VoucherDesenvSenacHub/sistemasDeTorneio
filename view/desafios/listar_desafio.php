<?php
require '../../app/controller/desafios.php';


  $objUser = new Desafio();

  $dados = $objUser->buscar();

  // print_r($dados);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <!-- Button de hamburguer -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> <!-- Icone de hamburguer -->
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="../../index.php">Dashboard</a>
        </li>

        <li class="nav-item dropdown">
          <!-- Dropdown link para Desafios -->
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownDesafios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Desafios
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownDesafios">
              <li class="nav-item">
                <a class="nav-link" href="./cadastrar_desafio.php">Cadastrar Desafio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Listar Desafio</a>
              </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
          <!-- Dropdown link para Times -->
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownTimes" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Times
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownTimes">
              <li class="nav-item">
                <a class="nav-link" href="../times/cadastrar_time.php">Cadastrar Times</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../times/listar_time.php">Listar Times</a>
              </li>
            </ul>
          </li>

        </ul>
    </div>
  </div>
</nav>

    <div class="container">
        <h1 class="mt-4 text-center">Lista de Desafios </h1>
    </div>
    
    <div class="container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">enunciado</th>
              <th scope="col">A)</th>
              <th scope="col">B)</th>
              <th scope="col">C)</th>
              <th scope="col">D)</th>
              <th scope="col">E)</th>
              <th scope="col">Resposta</th>
            </tr>
          </thead>

          <tbody>
            <?php
              foreach($dados as $desafio){
                echo '
                <tr>
                  <th scope="row">'.$desafio->id_desafio.'</th>
                  <td>'.$desafio->nome.'</td>
                  <td>'.$desafio->enunciado.'</td>
                  <td>'.$desafio->opcaoA.'</td>
                  <td>'.$desafio->opcaoB.'</td>
                  <td>'.$desafio->opcaoC.'</td>
                  <td>'.$desafio->opcaoD.'</td>
                  <td>'.$desafio->opcaoE.'</td>
                  <td>'.$desafio->resposta.'</td>
                  <td><a class="btn btn-primary" href="./editar_desafio.php?id_desc='.$desafio->id_desafio.'"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a class="btn btn-danger" href="./excluir_desafio.php?id_desc='.$desafio->id_desafio.'"><i class="bi bi-trash3"></i></a></td>

                </tr>
                ';
              }
            ?>

          </tbody>
        </table>
    </div>

</body>
</html>