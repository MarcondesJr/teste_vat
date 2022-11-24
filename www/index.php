<?php
    require_once("./cnx.php");
    require_once("./header.php");
    require_once("./buscar.php");
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
            <li class="nav-item">
                <a class="nav-link" href="./form.php">Nova Ordem de Serviço</a>
            </li> 
        </div>
        </div>
    </nav>
    <div class="container-fluid">
    <form action="./index.php" method="POST" name="pesquisar">
        <div class="form-row">
            <div class="container-fluid">
                <div class="form-group col-md-6">
                    <label for="ipos">O.S.: </label>
                    <input type="text" name="pos" id="ipos" class="form-control input-rounded" placeholder="Número da Ordem de Serviço">
                    <label for="ipnome">Solicitante:</label>
                    <input type="text" name="pnome" id="ipnome" class="form-control input-rounded" placeholder="Solicitante">
                    <label for="ipdescricao">Descrição :</label>
                    <input type="text" name="pdescricao" id="ipdescricao" class="form-control input-rounded" placeholder="Descrição da ordem de serviço">
                    <label for="ipocorrencia">Ocorrências:</label>
                    <input type="text" name="pocorrencia" id="ipocorrencia" class="form-control input-rounded" placeholder="Descrição da ocorrência">
                </div>
            </div>
        </div>
        <br>
            <button onclick="pesquisarDados()" type="submit" class="btn btn-primary" name="pesquisar" value="pesquisar">Pesquisar</button>
            <a href="./index.php" type="button" class="btn btn-primary">Mostrar Tabela</a>
    </form>
    </div>
    <br>
    <div class="container-fluid">
        <table class="table table-hover">
        <thead>
            <th>O.S. </th>
            <th>Criação</th>
            <th>Solicitante</th>
            <th>Ocorrência</th>
            <th>Opções</th>
        </thead>
        <tbody>
        <?php
        if ($ordem->num_rows == 0) { ?>
            <td colspan="3">Não encontrado nenhum resultado</td>
        <?php } else { while ($res = mysqli_fetch_assoc($ordem)) { ?>
            <tr>
            <td>
                <?php echo $res['os']; ?>
            </td>
            <td>
                <?php echo $res['data_criacao']; ?>
            </td>
            <td>
                <?php echo $res['nome']; ?>
            </td>
            <td>
                <?php echo $res['ocorrencia']; ?>
            </td>
            <td>
                <a href="view.php?os=<?php echo $res['os']; ?>">
                    <button type="button" class="btn btn-outline-primary" href="">
                        <span class="material-symbols-outlined">
                            visibility
                        </span>
                    </button>
                </a>
                <a href="editar.php?os=<?php echo $res['os']; ?>">
                    <button type="button" class="btn btn-outline-warning">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                    </button>
                </a>
                <a href="delete.php?os=<?php echo $res['os']; ?>">
                    <button type="button" class="btn btn-outline-danger" onclick="return confirm('Tem certeza que quer excluir esta OS ??')" ;>
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </button>
                </a>

            </td>
            </tr>
            <?php }} ?>
        </tbody>
        <tfoot>
            <th>O.S. </th>
            <th>Criação</th>
            <th>Solicitante</th>
            <th>Ocorrência</th>
            <th>Opções</th>
        </tfoot>
        </table>
    </div>

<?php
    require_once("./footer.php");
?>