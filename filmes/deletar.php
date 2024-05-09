<?php
include 'conexao.php';

$filme = $_POST['filme'];

$stmt = $conn->prepare("DELETE FROM filmes WHERE filme = '$filme'");
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