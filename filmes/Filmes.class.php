<?php

class filmes{
    private $titulo;
    private $genero;
    private $ano;

    public function __construct($titulo,$genero,$ano){
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->ano = $ano;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function exibirDetalhes(){
        return "Titulo: ".$this->titulo." genero: ".$this->genero." ano: ".$this->ano;
    }
}

?>