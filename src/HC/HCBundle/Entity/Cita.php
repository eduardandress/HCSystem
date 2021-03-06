<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cita
 */
class Cita
{
    /**
     * @var integer
     */
    private $idcita;

    /**
     * @var \DateTime
     */
    private $fechacreacion;

    /**
     * @var \DateTime
     */
    private $fechaprogramada;

    /**
     * @var string
     */
    private $horaprogramada;

    /**
     * @var string
     */
    private $motivo;

    /**
     * @var \HC\HCBundle\Entity\Paciente
     */
    private $idpaciente;

    /**
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idusuario;

    private $visita;

    public function __toString(){
        return $this->motivo;
    }
    /**
     * Get idcita
     *
     * @return integer 
     */
    public function getIdcita()
    {
        return $this->idcita;
    }

    /**
     * Set fechacreacion
     *
     * @param \DateTime $fechacreacion
     * @return Cita
     */
    public function setFechacreacion($fechacreacion)
    {
        $this->fechacreacion = $fechacreacion;

        return $this;
    }

    /**
     * Get fechacreacion
     *
     * @return \DateTime 
     */
    public function getFechacreacion()
    {
        return $this->fechacreacion;
    }

    /**
     * Set fechaprogramada
     *
     * @param \DateTime $fechaprogramada
     * @return Cita
     */
    public function setFechaprogramada($fechaprogramada)
    {
        $this->fechaprogramada = $fechaprogramada;

        return $this;
    }

    /**
     * Get fechaprogramada
     *
     * @return \DateTime 
     */
    public function getFechaprogramada()
    {
        return $this->fechaprogramada;
    }

    /**
     * Set horaprogramada
     *
     * @param string $horaprogramada
     * @return Cita
     */
    public function setHoraprogramada($horaprogramada)
    {
        $this->horaprogramada = $horaprogramada;

        return $this;
    }

    /**
     * Get horaprogramada
     *
     * @return string 
     */
    public function getHoraprogramada()
    {
        return $this->horaprogramada;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return Cita
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set idpaciente
     *
     * @param \HC\HCBundle\Entity\Paciente $idpaciente
     * @return Cita
     */
    public function setIdpaciente(\HC\HCBundle\Entity\Paciente $idpaciente = null)
    {
        $this->idpaciente = $idpaciente;

        return $this;
    }

    /**
     * Get idpaciente
     *
     * @return \HC\HCBundle\Entity\Paciente 
     */
    public function getIdpaciente()
    {
        return $this->idpaciente;
    }

    /**
     * Set idusuario
     *
     * @param \HC\HCBundle\Entity\Usuario $idusuario
     * @return Cita
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
        return $this->idcita;
    }
    public function _toString(){
        return $this->motivo;
    }

    /**
     * Set visita
     *
     * @param \HC\HCBundle\Entity\Visita $visita
     * @return Cita
     */
    public function setVisita(\HC\HCBundle\Entity\Visita $visita = null)
    {
        $this->visita = $visita;

        return $this;
    }

    /**
     * Get visita
     *
     * @return \HC\HCBundle\Entity\Visita 
     */
    public function getVisita()
    {
        return $this->visita;
    }
    public function ObtenerReporteInsercion(){
         $fecha = $this->getFechaprogramada()->format('Y-m-d');
         $descripcion=" una cita al paciente ".$this->getIdpaciente()->getNombre()." ".$this->getIdpaciente()->getApellido()." para el dia ". $fecha;
         return $descripcion;
    }
}
