<!doctype html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<title>
Pet Shop 
</title>

<link rel="stylesheet" href="../css/estilo.css" type="text/css">
</head>
<BODY>
<?php

include "conexao.php";

    $nome = $_POST["nome"];
    $raca = $_POST["raca"];
    $idade  = $_POST["idade"];
    $porte = $_POST["por"];
    $prop = $_POST["prop"];

    $sql -> query("insert into pet(codigo, nome, raca, idade, porte, nomep)value(null,'$nome','$raca','$idade','$porte','$prop')");

    echo "<j>Dados salvos com suceso</j>";

?>
