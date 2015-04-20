<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bitacora
 */
class Bitacora
{
    /**
     * @var integer
     */
    private $idbitacora;

    /**
     * @var string
     */
    private $tabla;

    /**
     * @var integer
     */
    private $idtupla;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var \HC\HCBundle\Entity\Tipoaccion
     */
    private $idtipoaccion;

    /**
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idusuario;


    /**
     * Get idbitacora
     *
     * @return integer 
     */
    public function getIdbitacora()
    {
        return $this->idbitacora;
    }

    /**
     * Set tabla
     *
     * @param string $tabla
     * @return Bitacora
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    /**
     * Get tabla
     *
     * @return string 
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set idtupla
     *
     * @param integer $idtupla
     * @return Bitacora
     */
    public function setIdtupla($idtupla)
    {
        $this->idtupla = $idtupla;

        return $this;
    }

    /**
     * Get idtupla
     *
     * @return integer 
     */
    public function getIdtupla()
    {
        return $this->idtupla;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Bitacora
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
     * @return Bitacora
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
     * Set idtipoaccion
     *
     * @param \HC\HCBundle\Entity\Tipoaccion $idtipoaccion
     * @return Bitacora
     */
    public function setIdtipoaccion(\HC\HCBundle\Entity\Tipoaccion $idtipoaccion = null)
    {
        $this->idtipoaccion = $idtipoaccion;

        return $this;
    }

    /**
     * Get idtipoaccion
     *
     * @return \HC\HCBundle\Entity\Tipoaccion 
     */
    public function getIdtipoaccion()
    {
        return $this->idtipoaccion;
    }

    /**
     * Set idusuario
     *
     * @param \HC\HCBundle\Entity\Usuario $idusuario
     * @return Bitacora
     */
    public function setIdusuario(\HC\HCBundle\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \HC\HCBundle\Entity\Usuario 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
    public function getId(){
        return $this->idbitacora;
    }
}
