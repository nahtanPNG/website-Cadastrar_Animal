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

    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $raca = $_POST["raca"];
    $idade  = $_POST["idade"];
    $porte = $_POST["por"];
    $prop = $_POST["prop"];

   $sql ->query("update pet set nome='$nome', raca='$raca',idade='$idade',porte='$porte', nomep='$prop' where codigo = $codigo");

   header("Location: listar.php");
?>