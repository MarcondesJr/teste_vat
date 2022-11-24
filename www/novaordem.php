<?php
    include_once("./cnx.php");

    if (isset($_POST['Submit'])) {
      $os = mysqli_real_escape_string($mysqli, $_POST['os']);
      $data = mysqli_real_escape_string($mysqli, $_POST['data']);
      $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
      $descricao = mysqli_real_escape_string($mysqli, $_POST['descricaoos']);
      $idocorrencias = $_POST['ocorrencias'];
  
      // checking empty fields
      if (empty($os) || empty($data) || empty($nome) || empty($descricao) || empty($idocorrencias)) {
        if (empty($os)) {
          echo "<font color='red'>Campo OS esta vazio.</font><br/>";
        }
  
        if (empty($data)) {
          echo "<font color='red'>Campo DATA esta vazio.</font><br/>";
        }
  
        if (empty($nome)) {
          echo "<font color='red'>Campo SOLICITANTE esta vazio.</font><br/>";
        }
  
        if (empty($descricao)) {
          echo "<font color='red'>Campo DESCRICAO esta vazio.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
      } else {
  
        //insert data to database	
        $ordem = mysqli_query($mysqli, "INSERT INTO ordem.ordem(os, data_criacao, nome, descricao_os) VALUES('$os','$data','$nome','$descricao')");
        for ($i = 0; $i < count($idocorrencias); $i++) {
          $ocorrencia = mysqli_query($mysqli, "INSERT INTO ordem.ordem_ocorrencia(fk_id_ocorrencia, fk_id_os) VALUES ('$idocorrencias[$i]','$os')");
        };
  
        header("Location:index.php");
      }
    }
?>

