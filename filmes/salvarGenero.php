<?php
include 'conexao.php';

$genero = $_POST['genero'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];

$stmt = $conn->prepare("INSERT INTO generos (genero, descricao, status) VALUES (?, ?, ?)");
$stmt->bind_param("isi",$genero, $descricao, $status);

if ($stmt->execute()) {
    
    header("Location: cadastrofilmes.php?resposta=1");
    $stmt->close();
    $conn->close();
    die();

} else {
   
    $stmt->close();
    $conn->close();
    header("Location: cadastrofilmes.php?resposta=0");
    die();
}


?>