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
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idusuario;

    public function getIdhci(){
        return $this->idnotacita->getIdhci();
    }
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

    /**
     * Set idusuario
     *
     * @param \HC\HCBundle\Entity\Usuario $idusuario
     * @return Diagnostico
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
        return $this->iddiagnostico;
    }
    public function getAttrsBusqueda(){
        return array("fecha","descripcion");
    }
    public function ObtenerReporteInsercion(){
         $pacienteNombre=$this->getIdnotacita()->getIdhci()->getIdpaciente()->getNombre();
     $pacienteApellido=$this->getIdnotacita()->getIdhci()->getIdpaciente()->getApellido();
        $cita=$this->getIdnotacita()->getIdcita()->getFechaprogramada()->format('Y-m-d');

           $descripcion=" un diagnóstico para el paciente ".$pacienteNombre." ".$pacienteApellido." a su cita programada para el dia: ".$cita ;
         return $descripcion;
    }
}
