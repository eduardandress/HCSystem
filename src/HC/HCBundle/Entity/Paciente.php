<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var string
     */
    private $medicopref;

    /**
     * @var string
     */
    private $telfmedico;

    private $telefonosPersonales;

    private $telefonosEmergencia;
    

        public function  __toString(){
            return $this->cedula;
        }
        public function __construct(){
          
           $this->telefonosPersonales=  new \Doctrine\Common\Collections\ArrayCollection();
           $this->telefonosEmergencia=  new \Doctrine\Common\Collections\ArrayCollection();
        
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
     * Set medicopref
     *
     * @param string $medicopref
     * @return Paciente
     */
    public function setMedicopref($medicopref)
    {
        $this->medicopref = $medicopref;

        return $this;
    }

    /**
     * Get medicopref
     *
     * @return string 
     */
    public function getMedicopref()
    {
        return $this->medicopref;
    }

    /**
     * Set telfmedico
     *
     * @param string $telfmedico
     * @return Paciente
     */
    public function setTelfmedico($telfmedico)
    {
        $this->telfmedico = $telfmedico;

        return $this;
    }

    /**
     * Get telfmedico
     *
     * @return string 
     */
    public function getTelfmedico()
    {
        return $this->telfmedico;
    }
    public function getTelefonosPersonales(){

        return $this->telefonosPersonales;
    }
     public function setTelefonosPersonales($telefonosPersonales){

        $this->telefonosPersonales= $telefonosPersonales;
        foreach ($telefonosPersonales as $telfP) {
            $telfP->setIdPaciente($this);
        }
    }
 
    public function getTelefonosEmergencia(){
        return $this->telefonosEmergencia;
    }

    public function setTelefonosEmergencia($telefonosEmergencia){
        $this->telefonosEmergencia= $telefonosEmergencia;
        foreach ($telefonosEmergencia as $telfE) {
                $telfE->setIdPaciente($this);
        }
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


}
