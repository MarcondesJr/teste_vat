<?php
if (!empty($_POST['pesquisar'])) {
    $dados = $_POST['pesquisar'];
    $os = $_POST['pos'];
    $nome = $_POST['pnome'];
    $descricao = $_POST['pdescricao'];
    $ocorrencia = $_POST['pocorrencia'];

    $ordem = mysqli_query($mysqli,"SELECT os, nome, data_criacao, descricao_os, ocorrencia FROM ordem.ordem, ordem.ocorrencia, ordem.ordem_ocorrencia WHERE os LIKE '%$os%' AND nome LIKE '%$nome%' AND descricao_os LIKE '%$descricao%' AND ocorrencia LIKE '%$ocorrencia%' AND fk_id_os = os AND fk_id_ocorrencia = id_ocorrencia");
    $ordemTable = mysqli_query($mysqli,"SELECT os, nome, data_criacao FROM ordem");
} else {
    $ordem = mysqli_query($mysqli, "SELECT os, nome, data_criacao, descricao_os, ocorrencia FROM ordem.ordem, ordem.ocorrencia, ordem.ordem_ocorrencia WHERE fk_id_os = os AND fk_id_ocorrencia = id_ocorrencia");
    $ordemTable = mysqli_query($mysqli,"SELECT os, nome, data_criacao FROM ordem");
    $ocorrencia = mysqli_query($mysqli,"SELECT * FROM ordem, ocorrencia, ordem_ocorrencia WHERE fk_id_os = os AND fk_id_ocorrencia = id_ocorrencia");
}
?>