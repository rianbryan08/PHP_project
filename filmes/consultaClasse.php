<?php

include("Filmes.class.php");

$meuFilme = new Filmes("teste","terror","1999");

echo $meuFilme->exibirDetalhes();

$meuFilme->setTitulo("novo titulo");
echo "<br>".$meuFilme->exibirDetalhes();

?>