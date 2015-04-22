<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phcimedicamento
 */
class Phcimedicamento
{
    /**
     * @var integer
     */
    private $idphcimedicamento;

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
     * Get idphcimedicamento
     *
     * @return integer 
     */
    public function getIdphcimedicamento()
    {
        return $this->idphcimedicamento;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Phcimedicamento
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
     * @return Phcimedicamento
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
     * @return Phcimedicamento
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
        return $this->idphcimedicamento;
    }

    public function getAttrsBusqueda(){
        return array("descripcion","fechaactualizacion");
    }
}
