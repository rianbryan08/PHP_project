<?php
include 'conexao.php';

$genero = $_POST['genero'];
$titulo = $_POST['titulo'];
$ano = $_POST['ano'];

$stmt = $conn->prepare("INSERT INTO filmes (ano, genero, titulo) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $ano, $genero, $titulo);

if ($stmt->execute()) {
    
    header("Location: cadastrofilmes.php?resposta=1");
    $stmt->close();
    $conn->close();
    die();

} else {
   
    $stmt->close();
    $conn->close();
    header("Location: cadastrofilmess.php?resposta=0");
    die();
}


?>