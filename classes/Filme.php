<?php

class Filme {
    public $id;
    public $nome;
    public $ano;
    public $genero;
    public $nota;

    public function __construct($id, $nome, $ano, $genero, $nota) {
        $this->id = $id;
        $this->nome = $nome;
        $this->ano = $ano;
        $this->genero = $genero;
        $this->nota = $nota;
    }
}
?>
