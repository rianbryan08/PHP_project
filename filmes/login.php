<link rel="stylesheet" href="login.css" /> 
<?php

    include 'conexao.php';
    $usuario= $_POST["usuario"];    
    $senha= $_POST["senha"];

$sqlUsuarios = "select nome from usuarios where cpf='$usuario' and senha='$senha'";
$resultado = $conn->query($sqlUsuarios);
$row2 = $resultado->fetch_assoc();

if(isset($row2) && $row2['nome'] |= ''){

    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = $row2['nome'];
    
    header("location: cadastrofilmes.php");
    
}else{

    die("senha incorreta");

}

?>