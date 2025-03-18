<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../../app/controller/desafios.php';

if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $enunciado = $_POST['enunciado'];
    $opcaoA = $_POST['opcaoA'];
    $opcaoB = $_POST['opcaoB'];
    $opcaoC = $_POST['opcaoC'];
    $opcaoD = $_POST['opcaoD'];
    $opcaoE = $_POST['opcaoE'];
    $resposta = $_POST['resposta'];

    $objUser = new Desafio();

    $objUser->nome = $nome;
    $objUser->enunciado = $enunciado;
    $objUser->opcaoA = $opcaoA;
    $objUser->opcaoB = $opcaoB;
    $objUser->opcaoC = $opcaoC;
    $objUser->opcaoD = $opcaoD;
    $objUser->opcaoE = $opcaoE;
    $objUser->resposta = $resposta;

    $res = $objUser->cadastrar();

    if($res){
        echo "<script>alert('Cadastrado com Sucesso') </script>";
    }else{
        echo "<script>alert('Erro ao Cadastrar') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Desafio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="../../index.php">Dashboard</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownDesafios" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Desafios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownDesafios">
            <li class="nav-item">
              <a class="nav-link" href="">Cadastrar Desafio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./listar_desafio.php">Listar Desafio</a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
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
    <h1 class="mt-4 text-center">Cadastrar Desafio</h1>
</div>

<div class="container">
    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Desafio</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="enunciado" class="form-label">Enunciado do Desafio</label>
            <input type="text" class="form-control" id="enunciado" name="enunciado" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Respostas</label>
            <div class="row">
                <div class="col-2"><label>a)</label><input type="text" class="form-control" name="opcaoA" required></div>
                <div class="col-2"><label>b)</label><input type="text" class="form-control" name="opcaoB" required></div>
                <div class="col-2"><label>c)</label><input type="text" class="form-control" name="opcaoC" required></div>
                <div class="col-2"><label>d)</label><input type="text" class="form-control" name="opcaoD" required></div>
                <div class="col-2"><label>e)</label><input type="text" class="form-control" name="opcaoE" required></div>
            </div>
        </div>

        <div class="mb-3">
            <label for="resposta" class="form-label">Escolha a Resposta Correta</label>
            <select class="form-control" name="resposta" id="resposta" required>
                <option value="" disabled selected>Selecione uma opção...</option>
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
                <option value="d">d</option>
                <option value="e">e</option>
            </select>
        </div>

        <button type="reset" class="btn btn-danger">Cancelar</button>
        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

</body>
</html>
