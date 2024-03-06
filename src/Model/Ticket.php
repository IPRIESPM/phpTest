<?php

namespace src\Model;

class Ticket
{
    private $id;
    private $numero_mesa;
    private $mesa;
    private $codigo_producto;
    private $producto;
    private $cantidad;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNumeroMesa()
    {
        return $this->numero_mesa;
    }

    public function setNumeroMesa($numero_mesa)
    {
        $this->numero_mesa = $numero_mesa;

        return $this;
    }

    public function getMesa()
    {
        return $this->mesa;
    }

    public function setMesa($mesa)
    {
        $this->mesa = $mesa;

        return $this;
    }

    public function getCodigoProducto()
    {
        return $this->codigo_producto;
    }

    public function setCodigoProducto($codigo_producto)
    {
        $this->codigo_producto = $codigo_producto;

        return $this;
    }

    public function getProducto()
    {
        return $this->producto;
    }

    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
