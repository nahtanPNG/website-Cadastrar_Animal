<?php
    //verifica se o botao cadastrar foi selecionado
    $btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_DEFAULT);



    if($btnCadUsuario){
        include_once 'conexao.php';
        $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $erro=false;
        $dados_st= array_map('strip_tags',$dados_rc);
        $dados = array_map('trim',$dados_st);

        if(in_array('',$dados)){
            $erro = true;
            $_SESSION['msg'] = "Necessário preencher todos os campos";
        }elseif((strlen($dados['senha'])) <6){
            $erro = true;
            $_SESSION['msg'] = "A senha deve ter no minimo 6 caractere";
        }elseif(stristr($dados['senha'],"&")){
            $erro = true;
            $_SESSION['msg'] = "Caractere (&) utilizado na senha é invalido";
        }else{
            $result_usuario = "select id from usuarios where usuario='". $dados['usuario']. "'";
            $resultado_usuario = mysqli_query($sql, $result_usuario);
            if(($result_usuario) and ($resultado_usuario->num_rows != 0)){
                $erro = true;
                $_SESSION['msg'] = "Este usuário já está sendo utilizado";
            }

            $result_usuario = "select id from usuarios where email='". $dados['email']. "'";
            $resultado_usuario = mysqli_query($sql, $result_usuario);
            if(($result_usuario) and ($resultado_usuario->num_rows != 0)){
                $erro = true;
                $_SESSION['msg'] = "Este e-mail já está cadastrado";
            }
        }

        if(!$erro){
            $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

            $result_usuario = "insert into usuarios(nome, email, usuario, senha)values('".$dados['nome']."', 
            '".$dados['email']."', '".$dados['usuario']."', '".$dados['senha']."')";
            $result_usuario = mysqli_query($sql,$result_usuario);
            if(mysqli_insert_id($sql)){
                $_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
                header("Location: ../index.html");
            }else{
                $_SESSION['msgcad'] = "Erro ao cadastrar usuário";
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pet shop - Cadastro de usuários</title>
    <link rel="stylesheet" href="css/estilo1.css" type="text/css">
</head>
<body>

<div style="background: #42dea4;">
    <h2>Cdastrar Usuário</h2>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <form type="text" method="post" action="">
        <input type="text" name="nome" placeholder="Digite o nome e o sobrenome"><br>
        <input type="email" name="email" placeholder="Digite o seu e-mail"><br>
        <input type="text" name="usuario" placeholder="Digite o seu usáario"><br>
        <input type="password" name="senha" placeholder="Digite a sua senha"><br>
        <input type="submit" name="btnCadUsuario" value="Cadastrar"><br><br>

        <div style="margin-top: 28px;">
            Lembrou?<a href="../index.php">Clique aqui </a> para logar
        </div>
    </form>

</div>
    
</body>
</html>