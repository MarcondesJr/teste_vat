<?php
// including the database connection file
include_once("./cnx.php");
require_once("./header.php");

$os = $_GET['os'];

$ordem = mysqli_query($mysqli, "SELECT * FROM ordem.ordem WHERE os='$os'");
$ocorrencias = mysqli_query($mysqli, "SELECT * FROM ordem.ocorrencia");
$ordem_ocorrencias = mysqli_query($mysqli, "SELECT * FROM ordem.ordem_ocorrencia");
while ($res = mysqli_fetch_assoc($ordem)) {
	$os = $res['os'];
	$data = $res['data_criacao'];
	$nome = $res['nome'];
	$descricao = $res['descricao_os'];
}
while ($res = mysqli_fetch_assoc($ocorrencias)) {
	$idocorrencia = $res['id_ocorrencia'];
	$ocorrencia = $res['ocorrencia'];
}
while ($res = mysqli_fetch_assoc($ordem_ocorrencias)) {
	$fkidos = $res['fk_id_os'];
	$fkidocorrencia = $res['fk_id_ocorrencia'];
};


?>

<body>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<fieldset>
					<legend>Editar ordem de serviços</legend>
					<form action="./salvaEditar.php" method="post" name="form1">
						<table width="25%" border="0">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="ios">O.S.</label>
									<input class="form-control input-rounded" id="ios" name="os" value="<?php echo $os; ?>" readonly>
								</div>
								<div class="form-group col-md-6">
									<label for="idata">Criação</label>
									<input class="form-control input-rounded" id="idata" name="data" value="<?php echo $data; ?>" readonly>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label for="inome">Solicitante:</label>
									<input type="text" class="form-control input-rounded" placeholder="Nome Completo" value="<?php echo $nome; ?>" id="inome" name="nome">
								</div>
								<div class="form-group col-md-9">
									<label for="idescricaoos">Descrição da Ordem de serviços</label>
									<textarea class="form-control h-150px input-rounded" rows="1" id="idescricaoos" name="descricaoos"><?php echo $descricao; ?></textarea>
								</div>
							</div>
							<div class="form-group col-md-6">
							<label for="ocorrencia" id="iocorrencia">Selecione Ocorrências:</label>
							<div class="col-sm-6">
							<select class="select-multiple" name="ocorrencias[]" multiple="multiple">
							<?php
							foreach ($ocorrencias as $option) { ?>
									<option value="<?php echo $option['id_ocorrencia']; ?>" <?php foreach ($ordem_ocorrencias as $ordemocorrencia){if($option['id_ocorrencia'] == $ordemocorrencia['fk_id_ocorrencia'] and $ordemocorrencia['fk_id_os'] == $os){ echo 'selected';}else{ echo '';}};?>><?php echo $option['ocorrencia'];?></option>
							<?php } ?>
							</select>
							</div>
						</div>
						<br><br>
							<div>
								<a href="./index.php" type="button" class="btn btn-warning">Cancelar</a>
								<button type="submit" class="btn btn-primary" name="update" value="update">Concluir</button>
							</div>
						</table>
					</form>
				</fieldset>
			</div>
		</div>
	</div>
<?php require_once("./footer.php");?>
