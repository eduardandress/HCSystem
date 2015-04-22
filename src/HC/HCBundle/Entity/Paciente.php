<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

/**
 * Paciente
 */
class Paciente
{
    /**
     * @var integer
     */
    private $idpaciente;

    /**
     * @var string
     */
    private $cedula;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $fechanac;

    /**
     * @var string
     */
    private $numss;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $telefonosPersonales;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $telefonosEmergencia;

    /**
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idmedicopref;
    /**
     * @var \HC\HCBundle\Entity\Hci
     */
    private $historiamedica;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->telefonosPersonales = new \Doctrine\Common\Collections\ArrayCollection();
        $this->telefonosEmergencia = new \Doctrine\Common\Collections\ArrayCollection();
    }
      public function  __toString(){
            return $this->cedula;
        }
    /**
     * Get idpaciente
     *
     * @return integer 
     */
    public function getIdpaciente()
    {
        return $this->idpaciente;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Paciente
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Paciente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Paciente
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Paciente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set fechanac
     *
     * @param string $fechanac
     * @return Paciente
     */
    public function setFechanac($fechanac)
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    /**
     * Get fechanac
     *
     * @return string 
     */
    public function getFechanac()
    {
        return $this->fechanac;
    }

    /**
     * Set numss
     *
     * @param string $numss
     * @return Paciente
     */
    public function setNumss($numss)
    {
        $this->numss = $numss;

        return $this;
    }

    /**
     * Get numss
     *
     * @return string 
     */
    public function getNumss()
    {
        return $this->numss;
    }

    /**
     * Add telefonosPersonales
     *
     * @param \HC\HCBundle\Entity\Pactelf $telefonosPersonales
     * @return Paciente
     */
    public function addTelefonosPersonales(\HC\HCBundle\Entity\Pactelf $telefonosPersonales)
    {
        $this->telefonosPersonales[] = $telefonosPersonales;

        return $this;
    }

    /**
     * Remove telefonosPersonales
     *
     * @param \HC\HCBundle\Entity\Pactelf $telefonosPersonales
     */
    public function removeTelefonosPersonales(\HC\HCBundle\Entity\Pactelf $telefonosPersonales)
    {
        $this->telefonosPersonales->removeElement($telefonosPersonales);
    }

    /**
     * Get telefonosPersonales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelefonosPersonales()
    {
        return $this->telefonosPersonales;
    }

    /**
     * Add telefonosEmergencia
     *
     * @param \HC\HCBundle\Entity\Pacnumcontacto $telefonosEmergencia
     * @return Paciente
     */
    public function addTelefonosEmergencia(\HC\HCBundle\Entity\Pacnumcontacto $telefonosEmergencia)
    {
        $this->telefonosEmergencia[] = $telefonosEmergencia;

        return $this;
    }

    /**
     * Remove telefonosEmergencia
     *
     * @param \HC\HCBundle\Entity\Pacnumcontacto $telefonosEmergencia
     */
    public function removeTelefonosEmergencia(\HC\HCBundle\Entity\Pacnumcontacto $telefonosEmergencia)
    {
        $this->telefonosEmergencia->removeElement($telefonosEmergencia);
    }

    /**
     * Get telefonosEmergencia
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelefonosEmergencia()
    {
        return $this->telefonosEmergencia;
    }

    /**
     * Set idmedicopref
     *
     * @param \HC\HCBundle\Entity\Usuario $idmedicopref
     * @return Paciente
     */
    public function setIdmedicopref(\HC\HCBundle\Entity\Usuario $idmedicopref = null)
    {
        $this->idmedicopref = $idmedicopref;

        return $this;
    }

    /**
     * Get idmedicopref
     *
     * @return \HC\HCBundle\Entity\Usuario 
     */
    public function getIdmedicopref()
    {
 
         return $this->idmedicopref;
    }
    public function setTelefonosPersonales($telefonosPersonales){

        $this->telefonosPersonales= $telefonosPersonales;
        foreach ($telefonosPersonales as $telfP) {
            $telfP->setIdPaciente($this);
        }
    }
   public function setTelefonosEmergencia($telefonosEmergencia){
        $this->telefonosEmergencia= $telefonosEmergencia;
        foreach ($telefonosEmergencia as $telfE) {
                $telfE->setIdPaciente($this);
        }
    }
  
    public function getId(){
        return $this->idpaciente;
    }

    /**
     * Add historiamedica
     *
     * @param \HC\HCBundle\Entity\Hci $historiamedica
     * @return Paciente
     */
    public function addHistoriamedica(\HC\HCBundle\Entity\Hci $historiamedica)
    {
        $this->historiamedica[] = $historiamedica;

        return $this;
    }

    /**
     * Remove historiamedica
     *
     * @param \HC\HCBundle\Entity\Hci $historiamedica
     */
    public function removeHistoriamedica(\HC\HCBundle\Entity\Hci $historiamedica)
    {
        $this->historiamedica->removeElement($historiamedica);
    }

    /**
     * Get historiamedica
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistoriamedica()
    {
        return $this->historiamedica;
    }

    /**
     * Add telefonosPersonales
     *
     * @param \HC\HCBundle\Entity\Pactelf $telefonosPersonales
     * @return Paciente
     */
    public function addTelefonosPersonale(\HC\HCBundle\Entity\Pactelf $telefonosPersonales)
    {
        $this->telefonosPersonales[] = $telefonosPersonales;

        return $this;
    }

    /**
     * Remove telefonosPersonales
     *
     * @param \HC\HCBundle\Entity\Pactelf $telefonosPersonales
     */
    public function removeTelefonosPersonale(\HC\HCBundle\Entity\Pactelf $telefonosPersonales)
    {
        $this->telefonosPersonales->removeElement($telefonosPersonales);
    }

    /**
     * Add telefonosEmergencia
     *
     * @param \HC\HCBundle\Entity\Pacnumcontacto $telefonosEmergencia
     * @return Paciente
     */
    public function addTelefonosEmergencium(\HC\HCBundle\Entity\Pacnumcontacto $telefonosEmergencia)
    {
        $this->telefonosEmergencia[] = $telefonosEmergencia;

        return $this;
    }

    /**
     * Remove telefonosEmergencia
     *
     * @param \HC\HCBundle\Entity\Pacnumcontacto $telefonosEmergencia
     */
    public function removeTelefonosEmergencium(\HC\HCBundle\Entity\Pacnumcontacto $telefonosEmergencia)
    {
        $this->telefonosEmergencia->removeElement($telefonosEmergencia);
    }

    /**
     * Set historiamedica
     *
     * @param \HC\HCBundle\Entity\Hci $historiamedica
     * @return Paciente
     */
    public function setHistoriamedica(\HC\HCBundle\Entity\Hci $historiamedica = null)
    {
        $this->historiamedica = $historiamedica;

        return $this;
    }
    public function ObtenerReporteInsercion(){
         $descripcion=" un paciente . Cédula: ".$this->getCedula()."  ".$this->getNombre()." ".$this->getApellido();
         return $descripcion;
    }
}
