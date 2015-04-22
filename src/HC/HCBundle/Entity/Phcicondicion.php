<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phcicondicion
 */
class Phcicondicion
{
    /**
     * @var integer
     */
    private $idphcicondicion;

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
     * Get idphcicondicion
     *
     * @return integer 
     */
    public function getIdphcicondicion()
    {
        return $this->idphcicondicion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Phcicondicion
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
     * @return Phcicondicion
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
     * @return Phcicondicion
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
        return $this->idphcicondicion;
    }
    public function getAttrsBusqueda(){
        return array("descripcion","fechaactualizacion");
    }

    public function ObtenerReporteInsercion(){
        $pacienteNombre=$this->getIdhci()->getIdpaciente()->getNombre();
        $pacienteApellido=$this->getIdhci()->getIdpaciente()->getApellido();
         $descripcion=" una condición del paciente ".$pacienteNombre." ".$pacienteApellido;

         return $descripcion;
    }
}
