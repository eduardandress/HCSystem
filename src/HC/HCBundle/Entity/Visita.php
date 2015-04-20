<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visita
 */
class Visita
{
    /**
     * @var integer
     */
    private $idvisita;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var \HC\HCBundle\Entity\Paciente
     */
    private $idpaciente;

    /**
     * @var \HC\HCBundle\Entity\Cita
     */
    private $idcita;

    /**
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idmedico;

    /**
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idenfermera;


    /**
     * Get idvisita
     *
     * @return integer 
     */
    public function getIdvisita()
    {
        return $this->idvisita;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Visita
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
     * Set idpaciente
     *
     * @param \HC\HCBundle\Entity\Paciente $idpaciente
     * @return Visita
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
     * Set idcita
     *
     * @param \HC\HCBundle\Entity\Cita $idcita
     * @return Visita
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

    /**
     * Set idmedico
     *
     * @param \HC\HCBundle\Entity\Usuario $idmedico
     * @return Visita
     */
    public function setIdmedico(\HC\HCBundle\Entity\Usuario $idmedico = null)
    {
        $this->idmedico = $idmedico;

        return $this;
    }

    /**
     * Get idmedico
     *
     * @return \HC\HCBundle\Entity\Usuario 
     */
    public function getIdmedico()
    {
        return $this->idmedico;
    }

    /**
     * Set idenfermera
     *
     * @param \HC\HCBundle\Entity\Usuario $idenfermera
     * @return Visita
     */
    public function setIdenfermera(\HC\HCBundle\Entity\Usuario $idenfermera = null)
    {
        $this->idenfermera = $idenfermera;

        return $this;
    }

    /**
     * Get idenfermera
     *
     * @return \HC\HCBundle\Entity\Usuario 
     */
    public function getIdenfermera()
    {
        return $this->idenfermera;
    }
    public function getId(){
        return $this->idvisita;
    }
}
