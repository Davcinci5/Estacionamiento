<?php

  class ConfigPrecios {

    private $tipo;
    private $fraccion;
    private $hora;
    private $dia;
    private $semana;
    private $mes;
    private $quincena;
    private $lavado;



    /**
     * Get the value of Tipo
     *
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of Tipo
     *
     * @param mixed tipo
     *
     * @return self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of Fraccion
     *
     * @return mixed
     */
    public function getFraccion()
    {
        return $this->fraccion;
    }

    /**
     * Set the value of Fraccion
     *
     * @param mixed fraccion
     *
     * @return self
     */
    public function setFraccion($fraccion)
    {
        $this->fraccion = $fraccion;

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
     * Get the value of Dia
     *
     * @return mixed
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set the value of Dia
     *
     * @param mixed dia
     *
     * @return self
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get the value of Semana
     *
     * @return mixed
     */
    public function getSemana()
    {
        return $this->semana;
    }

    /**
     * Set the value of Semana
     *
     * @param mixed semana
     *
     * @return self
     */
    public function setSemana($semana)
    {
        $this->semana = $semana;

        return $this;
    }

    /**
     * Get the value of Mes
     *
     * @return mixed
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set the value of Mes
     *
     * @param mixed mes
     *
     * @return self
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get the value of Quincena
     *
     * @return mixed
     */
    public function getQuincena()
    {
        return $this->quincena;
    }

    /**
     * Set the value of Quincena
     *
     * @param mixed quincena
     *
     * @return self
     */
    public function setQuincena($quincena)
    {
        $this->quincena = $quincena;

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

}


 ?>
