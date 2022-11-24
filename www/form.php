<?php
require_once("./cnx.php");
require_once("./header.php");
$optionocorrencias = mysqli_query($mysqli, "SELECT * FROM ordem.ocorrencia");
$ocorrencias[] = null;
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
					<legend>Gerar ordem de serviços</legend>
					<form action="./novaordem.php" method="post" name="form1">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="ios">O.S.</label>
								<input class="form-control input-rounded" id="ios" name="os" value="<?php echo $maior; ?> " readonly>
							</div>
							<div class="form-group col-md-6">
								<label for="idata">Criação</label>
								<input class="form-control input-rounded" id="idata" name="data" value="<?php echo $dataAtual; ?>" readonly>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inome">Solicitante:</label>
								<input type="text" class="form-control input-rounded" placeholder="Nome Completo" id="inome" name="nome">
							</div>
							<div class="form-group col-md-6">
								<label for="idescricaoos">Descrição da Ordem de serviços</label>
								<textarea class="form-control h-150px input-rounded" rows="2" id="idescricaoos" name="descricaoos"></textarea>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="ocorrencia" id="iocorrencia">Selecione Ocorrências:</label>
							<div class="col-sm-6">
							<select class="select-multiple" name="ocorrencias[]" multiple="multiple">
							<?php
							foreach ($optionocorrencias as $option) { ?>
							<option value="<?php echo $option['id_ocorrencia'] ?>"><?php echo $option['ocorrencia'] ?></option>
							<?php } ?>
							</select>
							</div>
						</div>
						<br><br>
						<div>
							<a href="./index.php" button type="button" class="btn btn-warning">Cancelar</a>
							<button type="submit" class="btn btn-primary" name="Submit" value="novaordem">Concluir</button>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>
	<?php require_once("./footer.php");
	?>