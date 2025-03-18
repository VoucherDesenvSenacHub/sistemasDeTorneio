<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../../app/controller/time.php';


if(isset($_GET['id_time'])){

  $id = $_GET['id_time'];

  $objUser = new Times_torneio();

  $desc_edit = $objUser->buscar_por_id($id);


  // ---atualiza
  if(isset($_POST['editar'])){

    $nome = $_POST['nome'];


    $desc_edit->nome = $nome;

    $res = $desc_edit->atualizar();

    if($res){
      echo "<script>alert('Editado com Sucesso') </script>";
      header('location: ./listar_time.php');
    }else{
      echo "<script>alert('Erro ao Cadastrar') </script>";
    }
  }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
              <li class="nav-item">
                <a class="nav-link text-white" href="./cadastrar_desafio.php">Cadastrar Desafio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="./listar_desafio.php">Lista Desafios</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>

    <div class="container">
        <h1 class="mt-4 text-center">Editar Time</h1>
    </div>
    
    <div class="container">
        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="nome" class="form-label">Nome Time</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome" value="<?php echo $desc_edit->nome;?>">
            </div>




            <button type="reset" class="btn btn-danger">Cancelar</button>
            <button type="submit" name="editar" class="btn btn-primary">Salvar</button>

          </form>
    </div>

</body>
</html>