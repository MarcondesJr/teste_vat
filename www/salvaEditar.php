<?php 
    require_once("./cnx.php");

    if (isset($_POST['update'])) {
        $os = mysqli_real_escape_string($mysqli, $_POST['os']);
        $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $descricao = mysqli_real_escape_string($mysqli, $_POST['descricaoos']);
        $idocorrencias = $_POST['ocorrencias'];

        if (empty($nome) || empty($descricao) || empty($idocorrencias)) {
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
          $ordem = mysqli_query($mysqli, "UPDATE ordem set nome='$nome', descricao_os='$descricao' WHERE os = '$os'");
          for ($i = 0; $i < count($idocorrencias); $i++) {
            $ocorrencia = mysqli_query($mysqli, "UPDATE ordem_ocorrencia set fk_id_ocorrencia='$idocorrencias[$i]' WHERE '$os' = fk_id_os");
          };
    
          header("Location:index.php");
        }
    }

?>