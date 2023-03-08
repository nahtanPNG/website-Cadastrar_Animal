<?php

include "conexao.php";

$codigo = $_GET["codigo"];

mysqli_query($sql,"delete from pet where codigo = $codigo");

header("Location: listar.php");
?>