<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../../app/controller/desafios.php';


if(isset($_GET['id_desc'])){

  $id = $_GET['id_desc'];

  $objUser = new Desafio();

  $desc_edit = $objUser->buscar_por_id($id);


  // ---atualiza
  if(isset($_POST['editar'])){

    $pontos = $_POST['pontos'];
    $enunciado = $_POST['enunciado'];
    $opcaoA = $_POST['opcaoA'];
    $opcaoB = $_POST['opcaoB'];
    $opcaoC = $_POST['opcaoC'];
    $opcaoD = $_POST['opcaoD'];
    $opcaoE = $_POST['opcaoE'];
    $resposta = $_POST['resposta'];


    $desc_edit->pontos = $pontos;
    $desc_edit->enunciado = $enunciado;
    $desc_edit->opcaoA = $opcaoA;
    $desc_edit->opcaoB = $opcaoB;
    $desc_edit->opcaoC = $opcaoC;
    $desc_edit->opcaoD = $opcaoD;
    $desc_edit->opcaoE = $opcaoE;
    $desc_edit->resposta = $resposta;

    $res = $desc_edit->atualizar();

    if($res){
      echo "<script>alert('Editado com Sucesso') </script>";
      header('location: ./listar_desafio.php');
    }else{
      echo "<script>alert('Erro ao Cadastrar') </script>";
    }
  }
}

require './menuPerguntas.php'
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

    <div class="container">
        <h1 class="mt-4 text-center">Editar Perguntas</h1>
    </div>
    
    <div class="container">
        <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="enunciado" class="form-label">Enunciado da pergunta</label>
            <input type="text" class="form-control" id="enunciado" name="enunciado" value="<?php echo $desc_edit->enunciado;?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Respostas</label>
            <div class="row">
                <div class="col-2"><label>a)</label><input type="text" class="form-control" name="opcaoA" value="<?php echo $desc_edit->opcaoA;?>"></div>
                <div class="col-2"><label>b)</label><input type="text" class="form-control" name="opcaoB" value="<?php echo $desc_edit->opcaoB;?>"></div>
                <div class="col-2"><label>c)</label><input type="text" class="form-control" name="opcaoC" value="<?php echo $desc_edit->opcaoC;?>"></div>
                <div class="col-2"><label>d)</label><input type="text" class="form-control" name="opcaoD" value="<?php echo $desc_edit->opcaoD;?>"></div>
                <div class="col-2"><label>e)</label><input type="text" class="form-control" name="opcaoE" value="<?php echo $desc_edit->opcaoE;?>"></div>
            </div>
        </div>

        <div class="mb-3">
            <label for="resposta" class="form-label">Escolha a Resposta Correta</label>
            <select class="form-control" name="resposta" id="resposta">
                <option value="" disabled selected>Selecione uma opção...</option>
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
                <option value="d">d</option>
                <option value="e">e</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Quantidade de pontos recebidos</label>
            <input type="number" class="form-control" id="pontos" name="pontos">
        </div>

            <button type="reset" class="btn btn-danger">Cancelar</button>
            <button type="submit" name="editar" class="btn btn-primary">Salvar</button>

          </form>
    </div>

</body>
</html>