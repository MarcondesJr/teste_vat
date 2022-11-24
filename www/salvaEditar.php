<?php 
    require_once("./cnx.php");

    if (isset($_POST['update'])) {
        $os = mysqli_real_escape_string($mysqli, $_POST['os']);
        $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
        $descricao = mysqli_real_escape_string($mysqli, $_POST['descricaoos']);
        $idocorrencias = $_POST['ocorrencias'];

        $ordem = mysqli_query($mysqli, "UPDATE ordem set nome='$nome', descricao_os='$descricao' WHERE os = '$os'");
        for ($i = 0; $i < count($idocorrencias); $i++) {
          $ocorrencia = mysqli_query($mysqli, "UPDATE ordem_ocorrencia SET fk_id_ocorrencia = '$idocorrencias[$i]' WHERE fk_id_os = '$os')");
        };
    }

    header('Location: index.php');
?>