<?php

  class ConfigTicket {

    private $id_config;
    private $nom_estacionamiento;
    private $domicilio;
    private $telefono;
    private $sitio;
    private $pie_pagina;
    private $logotipo;
    private $encabezado;

    /**
     * Get the value of Id Config
     *
     * @return mixed
     */
    public function getIdConfig()
    {
        return $this->id_config;
    }

    /**
     * Set the value of Id Config
     *
     * @param mixed id_config
     *
     * @return self
     */
    public function setIdConfig($id_config)
    {
        $this->id_config = $id_config;

        return $this;
    }

    /**
     * Get the value of Nom Estacionamiento
     *
     * @return mixed
     */
    public function getNomEstacionamiento()
    {
        return $this->nom_estacionamiento;
    }

    /**
     * Set the value of Nom Estacionamiento
     *
     * @param mixed nom_estacionamiento
     *
     * @return self
     */
    public function setNomEstacionamiento($nom_estacionamiento)
    {
        $this->nom_estacionamiento = $nom_estacionamiento;

        return $this;
    }

    /**
     * Get the value of Domicilio
     *
     * @return mixed
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set the value of Domicilio
     *
     * @param mixed domicilio
     *
     * @return self
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get the value of Telefono
     *
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of Telefono
     *
     * @param mixed telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of Sitio
     *
     * @return mixed
     */
    public function getSitio()
    {
        return $this->sitio;
    }

    /**
     * Set the value of Sitio
     *
     * @param mixed sitio
     *
     * @return self
     */
    public function setSitio($sitio)
    {
        $this->sitio = $sitio;

        return $this;
    }

    /**
     * Get the value of Pie Pagina
     *
     * @return mixed
     */
    public function getPiePagina()
    {
        return $this->pie_pagina;
    }

    public function getPiePaginaSalida()
    {
        return $this->pie_pagina_salida;
    }

    /**
     * Set the value of Pie Pagina
     *
     * @param mixed pie_pagina
     *
     * @return self
     */
    public function setPiePagina($pie_pagina)
    {
        $this->pie_pagina = $pie_pagina;

        return $this;
    }

    public function setPiePaginaSalida($pie_pagina)
    {
        $this->pie_pagina_salida = $pie_pagina;

        return $this;
    }

    /**
     * Get the value of Logotipo
     *
     * @return mixed
     */
    public function getLogotipo()
    {
        return $this->logotipo;
    }

    /**
     * Set the value of Logotipo
     *
     * @param mixed logotipo
     *
     * @return self
     */
    public function setLogotipo($logotipo)
    {
        $this->logotipo = $logotipo;

        return $this;
    }

    public function getEncabezado()
    {
        return $this->encabezado;
    }

    public function setEncabezado($encabezado)
    {
        $this->encabezado = $encabezado;

        return $this;
    }
}


 ?>
