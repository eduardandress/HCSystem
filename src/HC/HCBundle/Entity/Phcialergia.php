<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phcialergia
 */
class Phcialergia
{
    /**
     * @var integer
     */
    private $idphcialergia;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \DateTime
     */
    private $fechaactualizacion;

    /**
     * @var \HC\HCBundle\Entity\Hci
     */
    private $idhci;


    /**
     * Get idphcialergia
     *
     * @return integer 
     */
    public function getIdphcialergia()
    {
        return $this->idphcialergia;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Phcialergia
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
     * Set fechaactualizacion
     *
     * @param \DateTime $fechaactualizacion
     * @return Phcialergia
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
     * @return Phcialergia
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
    public function getId(){
        return $this->idphcialergia;
    }
}
