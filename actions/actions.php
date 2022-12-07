<?php
session_start();
//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

//verifica se o tipo não está definido
if (isset($_GET['tipo']) == false) {
    header('Location: ../index.php');
    exit();
}

$tipo = $_GET['tipo'];

//CADASTRO DE CLIENTES
if ($tipo == 'cliente') {

    $id = $_POST["id"];
    $nome = $_POST["nome"];

    if (!isset($nome) || $nome == '') {
        $_SESSION['erro'] = "Informe um nome para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE clientes SET nome = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente alterado com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO clientes (nome) VALUES(?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente incluído com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    }

} else {
    header('Location: ../index.php');
    exit();
}
