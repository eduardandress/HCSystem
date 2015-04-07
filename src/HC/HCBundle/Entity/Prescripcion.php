<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prescripcion
 */
class Prescripcion
{
    /**
     * @var integer
     */
    private $idprescripcion;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $instrucciones;

    /**
     * @var \HC\HCBundle\Entity\Notacita
     */
    private $idnotacita;


    /**
     * Get idprescripcion
     *
     * @return integer 
     */
    public function getIdprescripcion()
    {
        return $this->idprescripcion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Prescripcion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Prescripcion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set instrucciones
     *
     * @param string $instrucciones
     * @return Prescripcion
     */
    public function setInstrucciones($instrucciones)
    {
        $this->instrucciones = $instrucciones;

        return $this;
    }

    /**
     * Get instrucciones
     *
     * @return string 
     */
    public function getInstrucciones()
    {
        return $this->instrucciones;
    }

    /**
     * Set idnotacita
     *
     * @param \HC\HCBundle\Entity\Notacita $idnotacita
     * @return Prescripcion
     */
    public function setIdnotacita(\HC\HCBundle\Entity\Notacita $idnotacita = null)
    {
        $this->idnotacita = $idnotacita;

        return $this;
    }

    /**
     * Get idnotacita
     *
     * @return \HC\HCBundle\Entity\Notacita 
     */
    public function getIdnotacita()
    {
        return $this->idnotacita;
    }
}
