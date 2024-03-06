<?php

namespace src\Model;

class Product
{
    private $id;
    private $nombre;
    private $precio;

    public function __construct( $nombre, $precio)
    {
        if($nombre == null){
            return "No hay nombre";
        }
        if($precio == null){
            return "No hay precio";
        }
        $this->nombre = $nombre;
        $this->precio = $precio;
    }



    // Métodos getters y setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        if($this->nombre == null){
            return "No hay nombre";
        }
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        if($nombre == null){
            return "No hay nombre";
        }
        $this->nombre = $nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
}
