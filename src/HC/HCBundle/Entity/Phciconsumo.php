<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phciconsumo
 */
class Phciconsumo
{
    /**
     * @var integer
     */
    private $idphciconsumo;

    /**
     * @var \DateTime
     */
    private $fechaactualizacion;

    /**
     * @var \HC\HCBundle\Entity\Hci
     */
    private $idhci;

    /**
     * @var \HC\HCBundle\Entity\Tipoconsumo
     */
    private $idtipoconsumo;

    /**
     * @var \HC\HCBundle\Entity\Tipoestado
     */
    private $idtipoestado;


    /**
     * Get idphciconsumo
     *
     * @return integer 
     */
    public function getIdphciconsumo()
    {
        return $this->idphciconsumo;
    }

    /**
     * Set fechaactualizacion
     *
     * @param \DateTime $fechaactualizacion
     * @return Phciconsumo
     */
    public function setFechaactualizacion($fechaactualizacion)
    {
        $this->fechaactualizacion = $fechaactualizacion;

        return $this;
    }

    /**
     * Get fechaactualizacion
     *
     * @return \DateTime 
     */
    public function getFechaactualizacion()
    {
        return $this->fechaactualizacion;
    }

    /**
     * Set idhci
     *
     * @param \HC\HCBundle\Entity\Hci $idhci
     * @return Phciconsumo
     */
    public function setIdhci(\HC\HCBundle\Entity\Hci $idhci = null)
    {
        $this->idhci = $idhci;

        return $this;
    }

    /**
     * Get idhci
     *
     * @return \HC\HCBundle\Entity\Hci 
     */
    public function getIdhci()
    {
        return $this->idhci;
    }

    /**
     * Set idtipoconsumo
     *
     * @param \HC\HCBundle\Entity\Tipoconsumo $idtipoconsumo
     * @return Phciconsumo
     */
    public function setIdtipoconsumo(\HC\HCBundle\Entity\Tipoconsumo $idtipoconsumo = null)
    {
        $this->idtipoconsumo = $idtipoconsumo;

        return $this;
    }

    /**
     * Get idtipoconsumo
     *
     * @return \HC\HCBundle\Entity\Tipoconsumo 
     */
    public function getIdtipoconsumo()
    {
        return $this->idtipoconsumo;
    }

    /**
     * Set idtipoestado
     *
     * @param \HC\HCBundle\Entity\Tipoestado $idtipoestado
     * @return Phciconsumo
     */
    public function setIdtipoestado(\HC\HCBundle\Entity\Tipoestado $idtipoestado = null)
    {
        $this->idtipoestado = $idtipoestado;

        return $this;
    }

    /**
     * Get idtipoestado
     *
     * @return \HC\HCBundle\Entity\Tipoestado 
     */
    public function getIdtipoestado()
    {
        return $this->idtipoestado;
    }
}
