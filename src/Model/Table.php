<?php

namespace src\Model;

class Table
{
    private $numero;
    private $estado;

    public function __construct($numero, $estado = "Libre")
    {
        $this->numero = $numero;
        $this->estado = $estado;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        if ($estado == "Libre" || $estado == "Ocupada") {
            $this->estado = $estado;
        } else {
            echo "El estado no es valido";
        }
    }

    public function changeEstado()
    {
        if ($this->estado == "Libre") {
            $this->estado = "Ocupada";
        } else {
            $this->estado = "Libre";
        }
    }
}
