<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diagnostico
 */
class Diagnostico
{
    /**
     * @var integer
     */
    private $iddiagnostico;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \HC\HCBundle\Entity\Notacita
     */
    private $idnotacita;


    /**
     * Get iddiagnostico
     *
     * @return integer 
     */
    public function getIddiagnostico()
    {
        return $this->iddiagnostico;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Diagnostico
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Diagnostico
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set idnotacita
     *
     * @param \HC\HCBundle\Entity\Notacita $idnotacita
     * @return Diagnostico
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
