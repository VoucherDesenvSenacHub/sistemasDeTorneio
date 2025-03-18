<?php

require '../../app/controller/desafios.php';

if(isset($_GET['id_desc'])){

  $id = $_GET['id_desc'];

  $objUser = new Desafio;

  $desc_delete = $objUser->buscar_por_id($id);

  // print_r($desc_delete);

  $del = $desc_delete->excluir();

  if($del){
    header('location: ./listar_desafio.php');
    exit();
  }
}