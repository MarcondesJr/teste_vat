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
          $apagaOcorrencia = mysqli_query($mysqli, "DELETE FROM ordem.ordem_ocorrencia as oo WHERE $os = oo.fk_id_os");
          for ($i = 0; $i < count($idocorrencias); $i++) {
            $ordem_ocorrencia = mysqli_query($mysqli, "INSERT INTO ordem.ordem_ocorrencia(fk_id_ocorrencia, fk_id_os) VALUES ('$idocorrencias[$i]','$os')");
          };
    
          header("Location:index.php");
        }
    }

?>