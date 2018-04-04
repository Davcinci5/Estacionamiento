<?php

  class Corte {

    private $id_corte;
    private $fecha;
    private $hora;
    private $usuario;
    private $atendidos;
    private $efectivo_entregado;
    private $total_ingresos;
    private $egresos_descripcion;
    private $egresos_monto;
    private $en_caja;
    private $diferencia;
    private $importe;
    private $adicional;

    /**
     * Get the value of Id Corte
     *
     * @return mixed
     */
    public function getIdCorte()
    {
        return $this->id_corte;
    }

    /**
     * Set the value of Id Corte
     *
     * @param mixed id_corte
     *
     * @return self
     */
    public function setIdCorte($id_corte)
    {
        $this->id_corte = $id_corte;

        return $this;
    }

    /**
     * Get the value of Fecha
     *
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of Fecha
     *
     * @param mixed fecha
     *
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of Hora
     *
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of Hora
     *
     * @param mixed hora
     *
     * @return self
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of Usuario
     *
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @param mixed usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of Atendidos
     *
     * @return mixed
     */
    public function getAtendidos()
    {
        return $this->atendidos;
    }

    /**
     * Set the value of Atendidos
     *
     * @param mixed atendidos
     *
     * @return self
     */
    public function setAtendidos($atendidos)
    {
        $this->atendidos = $atendidos;

        return $this;
    }

    /**
     * Get the value of Efectivo Entregado
     *
     * @return mixed
     */
    public function getEfectivoEntregado()
    {
        return $this->efectivo_entregado;
    }

    /**
     * Set the value of Efectivo Entregado
     *
     * @param mixed efectivo_entregado
     *
     * @return self
     */
    public function setEfectivoEntregado($efectivo_entregado)
    {
        $this->efectivo_entregado = $efectivo_entregado;

        return $this;
    }

    /**
     * Get the value of Total Ingresos
     *
     * @return mixed
     */
    public function getTotalIngresos()
    {
        return $this->total_ingresos;
    }

    /**
     * Set the value of Total Ingresos
     *
     * @param mixed total_ingresos
     *
     * @return self
     */
    public function setTotalIngresos($total_ingresos)
    {
        $this->total_ingresos = $total_ingresos;

        return $this;
    }

    /**
     * Get the value of Egresos Descripcion
     *
     * @return mixed
     */
    public function getEgresosDescripcion()
    {
        return $this->egresos_descripcion;
    }

    /**
     * Set the value of Egresos Descripcion
     *
     * @param mixed egresos_descripcion
     *
     * @return self
     */
    public function setEgresosDescripcion($egresos_descripcion)
    {
        $this->egresos_descripcion = $egresos_descripcion;

        return $this;
    }

    /**
     * Get the value of Egresos Monto
     *
     * @return mixed
     */
    public function getEgresosMonto()
    {
        return $this->egresos_monto;
    }

    /**
     * Set the value of Egresos Monto
     *
     * @param mixed egresos_monto
     *
     * @return self
     */
    public function setEgresosMonto($egresos_monto)
    {
        $this->egresos_monto = $egresos_monto;

        return $this;
    }

    /**
     * Get the value of En Caja
     *
     * @return mixed
     */
    public function getEnCaja()
    {
        return $this->en_caja;
    }

    /**
     * Set the value of En Caja
     *
     * @param mixed en_caja
     *
     * @return self
     */
    public function setEnCaja($en_caja)
    {
        $this->en_caja = $en_caja;

        return $this;
    }

    /**
     * Get the value of Diferencia
     *
     * @return mixed
     */
    public function getDiferencia()
    {
        return $this->diferencia;
    }

    /**
     * Set the value of Diferencia
     *
     * @param mixed diferencia
     *
     * @return self
     */
    public function setDiferencia($diferencia)
    {
        $this->diferencia = $diferencia;

        return $this;
    }

    /**
     * Get the value of Importe
     *
     * @return mixed
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of Importe
     *
     * @param mixed importe
     *
     * @return self
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get the value of Adicional
     *
     * @return mixed
     */
    public function getAdicional()
    {
        return $this->adicional;
    }

    /**
     * Set the value of Adicional
     *
     * @param mixed adicional
     *
     * @return self
     */
    public function setAdicional($adicional)
    {
        $this->adicional = $adicional;

        return $this;
    }

}

 ?>
