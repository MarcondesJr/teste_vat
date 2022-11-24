<?php
//including the database connection file
include("./cnx.php");

//getting id of the data from url
$id = $_GET['os'];

//deleting the row from table
$ordemxocorrencia = mysqli_query($mysqli, "DELETE FROM ordem.ordem_ocorrencia WHERE $id = ordem_ocorrencia.fk_id_os");
$ordem = mysqli_query($mysqli, "DELETE FROM ordem.ordem WHERE $id = ordem.os");

//redirecting to the display page (index.php in our case)
header("Location:index.php");