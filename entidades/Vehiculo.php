<?php

  class Vehiculo {

      private $folio;
      private $placas;
      private $modelo;
      private $color;
      private $cajon;
      private $observaciones;
      private $tipo_auto;
      private $hora_entrada;
      private $hora_salida;
      private $fecha_entrada;
      private $fecha_salida;
      private $tiempo;
      private $lavado;
      private $adicional;
      private $monto_adicional;
      private $total;
      private $recibido;
      private $diferencia;




    /**
     * Get the value of Folio
     *
     * @return mixed
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * Set the value of Folio
     *
     * @param mixed folio
     *
     * @return self
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;

        return $this;
    }

    /**
     * Get the value of Placas
     *
     * @return mixed
     */
    public function getPlacas()
    {
        return $this->placas;
    }

    /**
     * Set the value of Placas
     *
     * @param mixed placas
     *
     * @return self
     */
    public function setPlacas($placas)
    {
        $this->placas = $placas;

        return $this;
    }

    /**
     * Get the value of Modelo
     *
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of Modelo
     *
     * @param mixed modelo
     *
     * @return self
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of Color
     *
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of Color
     *
     * @param mixed color
     *
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of Cajon
     *
     * @return mixed
     */
    public function getCajon()
    {
        return $this->cajon;
    }

    /**
     * Set the value of Cajon
     *
     * @param mixed cajon
     *
     * @return self
     */
    public function setCajon($cajon)
    {
        $this->cajon = $cajon;

        return $this;
    }

    /**
     * Get the value of Observaciones
     *
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of Observaciones
     *
     * @param mixed observaciones
     *
     * @return self
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get the value of Tipo Auto
     *
     * @return mixed
     */
    public function getTipoAuto()
    {
        return $this->tipo_auto;
    }

    /**
     * Set the value of Tipo Auto
     *
     * @param mixed tipo_auto
     *
     * @return self
     */
    public function setTipoAuto($tipo_auto)
    {
        $this->tipo_auto = $tipo_auto;

        return $this;
    }

    /**
     * Get the value of Hora Entrada
     *
     * @return mixed
     */
    public function getHoraEntrada()
    {
        return $this->hora_entrada;
    }

    /**
     * Set the value of Hora Entrada
     *
     * @param mixed hora_entrada
     *
     * @return self
     */
    public function setHoraEntrada($hora_entrada)
    {
        $this->hora_entrada = $hora_entrada;

        return $this;
    }

    /**
     * Get the value of Hora Salida
     *
     * @return mixed
     */
    public function getHoraSalida()
    {
        return $this->hora_salida;
    }

    /**
     * Set the value of Hora Salida
     *
     * @param mixed hora_salida
     *
     * @return self
     */
    public function setHoraSalida($hora_salida)
    {
        $this->hora_salida = $hora_salida;

        return $this;
    }

    /**
     * Get the value of Fecha Entrada
     *
     * @return mixed
     */
    public function getFechaEntrada()
    {
        return $this->fecha_entrada;
    }

    /**
     * Set the value of Fecha Entrada
     *
     * @param mixed fecha_entrada
     *
     * @return self
     */
    public function setFechaEntrada($fecha_entrada)
    {
        $this->fecha_entrada = $fecha_entrada;

        return $this;
    }

    /**
     * Get the value of Fecha Salida
     *
     * @return mixed
     */
    public function getFechaSalida()
    {
        return $this->fecha_salida;
    }

    /**
     * Set the value of Fecha Salida
     *
     * @param mixed fecha_salida
     *
     * @return self
     */
    public function setFechaSalida($fecha_salida)
    {
        $this->fecha_salida = $fecha_salida;

        return $this;
    }

    /**
     * Get the value of Tiempo
     *
     * @return mixed
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Set the value of Tiempo
     *
     * @param mixed tiempo
     *
     * @return self
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Get the value of Lavado
     *
     * @return mixed
     */
    public function getLavado()
    {
        return $this->lavado;
    }

    /**
     * Set the value of Lavado
     *
     * @param mixed lavado
     *
     * @return self
     */
    public function setLavado($lavado)
    {
        $this->lavado = $lavado;

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

    /**
     * Get the value of Monto Adicional
     *
     * @return mixed
     */
    public function getMontoAdicional()
    {
        return $this->monto_adicional;
    }

    /**
     * Set the value of Monto Adicional
     *
     * @param mixed monto_adicional
     *
     * @return self
     */
    public function setMontoAdicional($monto_adicional)
    {
        $this->monto_adicional = $monto_adicional;

        return $this;
    }



    /**
     * Get the value of Total
     *
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of Total
     *
     * @param mixed total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    public function setRecibido($recibido)
    {
        $this->recibido = $recibido;

        return $this;
    }

    public function getRecibido()
    {
        return $this->recibido;
    }

    public function setDiferencia($diferencia)
    {
        $this->diferencia = $diferencia;

        return $this;
    }

    public function getDiferencia()
    {
        return $this->diferencia;
    }

}

 ?>
