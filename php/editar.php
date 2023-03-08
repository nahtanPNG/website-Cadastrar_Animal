<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Cadastro Animal
</title>
</head>
<link rel="stylesheet" href="../css/estilo.css" type="text/css">
<h3> Alterar Cadastro de animal </h3>
<body>

<?php
    include "conexao.php";
    $id = $_GET["codigo"];
    $query = mysqli_query($sql, "select * from pet where codigo = $id");

    $row = mysqli_fetch_array($query);
?>

<center>

<form type="text" name="form" method="post" action="../php/salvar_alteracao.php">

<input type="hidden" name="codigo" value="<?php echo $row['codigo'];?>">

<label>Nome:</label>
<input type="text" name="nome" id="tab1" value="<?php echo $row['nome'];?>"><br><br>
<label>Raça:</label>
<input type="text" name="raca" id="tab2" value="<?php echo $row['raca'];?>"><br><br>
<label>Idade:</label>
<input type="text" name="idade" id="tab3" value="<?php echo $row['idade'];?>"
<input type="text" name="por" id="tab4" value="<?php echo $row['porte'];?>"><br><br>
<label>Nome do Proprietário:</label>
<input type="text" name="prop" id="tab5" value="<?php echo $row['nomep'];?>"><br><br>


<input type="submit" id="botao" value="Salvar Alteração" id="botao"  /><br><br>
<input type="reset" id="botao" value="Limpar Campos" id="botao" />
</center>
</body>
</html>



</body>