<?php
    //Verifica se o botão cadastrar foi selecionado
    $btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);

    if($btnCadUsuario){
        include_once 'conexao.php';
        $dados_rc = filter_input(INPUT_POST, FILTER_DEFAULT);

        $erro = false;
        $dados_st = array_map('strip_tags', $dados_rc);
        $dados = array_map('trim', $dados_st);

        if(in_array('',$dados)){
            $erro = true;
            $_SESSION['msg'] = "Necessário preencher todos os campos";
        }elseif((strlen($dados['senha'])) < 6){
            $erro = true;
            $_SESSION['msg'] = "A senha deve ter no minimo 6 caracteres";
        }elseif(stristr($dados['senha'], "&")){
            $erro = true;
            $_SESSION['msg'] = "Caracter (&) utilizado na senha é inválido";
        }

    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/estilo1.css" type="text/css">
</head>
<body>

<div style="background:#42dea4;">
    <h2>Cadastrar Usuário</h2>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?> 

    <form type="text" method="post" action="">
        <input type="text" name="nome" placeholder="Digite o nome e o sobrenome"><br>
        <input type="text" name="email" placeholder="Digite o seu e-mail"><br>
        <input type="text" name="usuario" placeholder="Digite o seu usuário"><br>
        <input type="password" name="senha" placeholder="Digite a sua senha"><br>
        <input type="submit" name="btnCadUsuario" value="Cadastrar"><br><br>

        <div style="margin-top: 20px;">
            Lembrou? <a hred="../index.php">Clique aqui</a> para logar
        
        </div>

    </form>
</div>

</body>
</html>