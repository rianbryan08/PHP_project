<?php
include("conexao.php");

$filme = $_POST['filme'];
$ano = $_POST['ano'];
$titulo = $_POST['titulo'];
$genero = $_POST['genero'];


$sql = "update filmes
            set ano = '$ano',
            titulo = '$titulo',
            genero = '$genero'
        where filme = $filme";

if($conn->query($sql)){
    header("Location: cadastrofilmes.php?resposta=5");
    $conn->close();
    die();
}else{
    header("Location: cadastrofilmes.php?resposta=6");
    $conn->close();
    die();
}
$conn->close();
?>