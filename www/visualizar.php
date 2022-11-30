<?php
require_once("./cnx.php");
require_once("./header.php");
$os = $_GET['os'];
$ocorrencias[] = null;
$ordem = mysqli_query($mysqli, "SELECT os, data_criacao, nome, descricao_os, id_ocorrencia, ocorrencia, fk_id_os, fk_id_ocorrencia FROM ordem.ordem, ordem.ocorrencia, ordem.ordem_ocorrencia WHERE fk_id_os = os AND fk_id_ocorrencia = id_ocorrencia");
$optionocorrencias = mysqli_query($mysqli, "SELECT * FROM ordem.ocorrencia");
while ($res = mysqli_fetch_array($ordem)) {
	$data = $res['data_criacao'];
	$nome = $res['nome'];
	$descricao = $res['descricao_os'];
	$idocorrencia = $res['id_ocorrencia'];
	$desocorrencia = $res['ocorrencia'];
	$fkidos = $res['fk_id_os'];
	$fkidocorrencia = $res['fk_id_ocorrencia'];
}
?>

<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">Vat Tecnologia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample01">
            <ul class="navbar-nav me-auto mb-2">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php">Principal</a>
            </li>
        </div>
        </div>
    </nav>
<div class="col-12">
		<div class="card">
			<div class="card-body conteiner-fluid">
				<fieldset>
					<legend>Visualizar ordem de serviços - #<?php echo $os; ?></legend>
					<table width="25%">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="ios">O.S. - #<?php echo $os; ?></label>
								</div>
                                <br>
								<div class="form-group col-md-6">
									<label for="idata">Criação - <?php echo $data; ?></label>
								</div>
                                <br>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label for="inome">Solicitante: <?php echo $nome; ?></label>
								</div>
                                <br>
								<div class="form-group col-md-9">
									<label for="idescricaoos">Descrição da Ordem de serviços - <?php echo $descricao; ?></label>
								</div>
                                <br>
							</div>
							<div class="form-group col-md-6">
							<label for="ocorrencia" id="iocorrencia">Selecione Ocorrências: <br><?php foreach ($ordem as $option){ if ($option['fk_id_os'] == $os) { echo '- ' . $option['ocorrencia'].'<br>';}}?></label>
						</div>
						<br><br>
				</fieldset>
			</div>
		</div>
	</div>
	<?php require_once("./footer.php");
	?>