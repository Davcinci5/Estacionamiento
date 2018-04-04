<?php

  class CortesVehiculos {

    private $id_corte;
    private $folio_vehiculo;
    private $total;
    private $recibido;
    private $diferencia;

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
     * Get the value of Folio Vehiculo
     *
     * @return mixed
     */
    public function getFolioVehiculo()
    {
        return $this->folio_vehiculo;
    }

    /**
     * Set the value of Folio Vehiculo
     *
     * @param mixed folio_vehiculo
     *
     * @return self
     */
    public function setFolioVehiculo($folio_vehiculo)
    {
        $this->folio_vehiculo = $folio_vehiculo;

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

    /**
     * Get the value of Recibido
     *
     * @return mixed
     */
    public function getRecibido()
    {
        return $this->recibido;
    }

    /**
     * Set the value of Recibido
     *
     * @param mixed recibido
     *
     * @return self
     */
    public function setRecibido($recibido)
    {
        $this->recibido = $recibido;

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

  }

?>
