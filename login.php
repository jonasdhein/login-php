<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php include('components/js.php') ?>
</head>

<body>
    <div class="container">
        <form method="post" action="actions/actions_login.php">
            <div>
                <label>Usuário</label>
                <input type="text" id="usuario" name="usuario">
            </div>
            <div>
                <label>Senha</label>
                <input type="password" id="senha" name="senha">
            </div>
            <?php
            if (isset($_SESSION["erro"])) {
                echo "<script>mensagem_erro('" . $_SESSION['erro'] . "')</script>";
                unset($_SESSION['erro']);
            }
            ?>
            <div>
                <input type="submit" id="logar" value="ENTRAR">
            </div>
        </form>
    </div>

</body>

</html>