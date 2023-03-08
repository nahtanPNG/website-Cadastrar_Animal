<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pets cadastrados</title>

    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
</head>
<body>
    <center>
    <h3>Lista de Pets</h3>

    <?php
        include "conexao.php";//inclui o código de conexão para dentrro desse arquivo
        $query = mysqli_query($sql, "select * from pet");//faz uma busca no bnco de dados na tabela pet
    ?>

    <table border="1">
    <tr id="linha1">
     <td align="center">Código</td>
     <td align="center">Nome</td>
     <td align="center">Raça</td>
     <td align="center">Idade</td>
     <td align="center">Porte</td>
     <td align="center">Propietário</td>
     <td align="center" colspan="2">Ação</td>
</tr>

<?php
    while($linha = mysqli_fetch_array($query)){
        $codigo = $linha['codigo'];
        $nome = $linha['nome'];
        $raca = $linha['raca'];
        $idade = $linha['idade'];
        $porte = $linha['porte'];
        $nomep = $linha['nomep'];

        echo"
            <tr>
            <td>$codigo</td>
            <td>$nome</td>
            <td>$raca</td>
            <td>$idade</td>
            <td>$porte</td>
            <td>$nomep</td>
            <td><a href=\"editar.php?codigo=$codigo\">Editar</a></td>

            <td><a href=\"excluir.php?codigo=$codigo\">Excluir</a></td>
            </tr>";
    }
?>

</table>

</center>
    
</body>
</html>