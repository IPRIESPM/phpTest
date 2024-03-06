<?php

namespace src\Model;

class Table{
    private $numero;
    private $estado;

    public function __construct($estado){
        $this->estado = $estado;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
}