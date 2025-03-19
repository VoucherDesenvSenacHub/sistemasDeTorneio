<?php
require '../../app/controller/time.php';


$objUser = new Times_torneio();

  $dados = $objUser->buscar();

  // print_r($dados);

  require './menuTimes.php'

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


    <div class="container">
        <h1 class="mt-4 text-center">Lista de times </h1>
    </div>
    
    <div class="container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
            </tr>
          </thead>

          <tbody>
            <?php
              foreach($dados as $time){
                echo '
                <tr>
                  <th scope="row">'.$time->id_times.'</th>
                  <td>'.$time->nome.'</td>
                  <td><a class="btn btn-primary" href="./editar_time.php?id_time='.$time->id_times.'"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a class="btn btn-danger" href="./excluir_time.php?id_time='.$time->id_times.'"><i class="bi bi-trash3"></i></a></td>

                </tr>
                ';
              }
            ?>

          </tbody>
        </table>
    </div>

</body>
</html>