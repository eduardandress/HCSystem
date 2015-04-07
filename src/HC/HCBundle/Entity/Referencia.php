<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referencia
 */
class Referencia
{
    /**
     * @var integer
     */
    private $idreferencia;

    /**
     * @var string
     */
    private $nombredoctor;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var \HC\HCBundle\Entity\Notacita
     */
    private $idnotacita;


    /**
     * Get idreferencia
     *
     * @return integer 
     */
    public function getIdreferencia()
    {
        return $this->idreferencia;
    }

    /**
     * Set nombredoctor
     *
     * @param string $nombredoctor
     * @return Referencia
     */
    public function setNombredoctor($nombredoctor)
    {
        $this->nombredoctor = $nombredoctor;

        return $this;
    }

    /**
     * Get nombredoctor
     *
     * @return string 
     */
    public function getNombredoctor()
    {
        return $this->nombredoctor;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Referencia
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Referencia
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
     * Set idnotacita
     *
     * @param \HC\HCBundle\Entity\Notacita $idnotacita
     * @return Referencia
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
