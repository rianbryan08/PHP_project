<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "cadastro_filmes";

// Criando a conexão
$conn = new mysqli($servidor, $usuario, $senha, $dbname);

// Checando a conexão
if ($conn->connect_error) {

    die("Falha na conexão: " . $conn->connect_error);
    
}
?>