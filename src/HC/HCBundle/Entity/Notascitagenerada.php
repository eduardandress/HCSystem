<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notascitagenerada
 */
class Notascitagenerada
{
    /**
     * @var integer
     */
    private $idnotacitagen;

    /**
     * @var integer
     */
    private $idnotacita;

    /**
     * @var \HC\HCBundle\Entity\Cita
     */
    private $idcita;


    /**
     * Get idnotacitagen
     *
     * @return integer 
     */
    public function getIdnotacitagen()
    {
        return $this->idnotacitagen;
    }

    /**
     * Set idnotacita
     *
     * @param integer $idnotacita
     * @return Notascitagenerada
     */
    public function setIdnotacita($idnotacita)
    {
        $this->idnotacita = $idnotacita;

        return $this;
    }

    /**
     * Get idnotacita
     *
     * @return integer 
     */
    public function getIdnotacita()
    {
        return $this->idnotacita;
    }

    /**
     * Set idcita
     *
     * @param \HC\HCBundle\Entity\Cita $idcita
     * @return Notascitagenerada
     */
    public function setIdcita(\HC\HCBundle\Entity\Cita $idcita = null)
    {
        $this->idcita = $idcita;

        return $this;
    }

    /**
     * Get idcita
     *
     * @return \HC\HCBundle\Entity\Cita 
     */
    public function getIdcita()
    {
        return $this->idcita;
    }
}
