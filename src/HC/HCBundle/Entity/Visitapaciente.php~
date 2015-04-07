<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitapaciente
 */
class Visitapaciente
{
    /**
     * @var integer
     */
    private $idvisitapaciente;

    /**
     * @var \HC\HCBundle\Entity\Cita
     */
    private $idcita;

    /**
     * @var \HC\HCBundle\Entity\Paciente
     */
    private $idpaciente;


    /**
     * Get idvisitapaciente
     *
     * @return integer 
     */
    public function getIdvisitapaciente()
    {
        return $this->idvisitapaciente;
    }

    /**
     * Set idcita
     *
     * @param \HC\HCBundle\Entity\Cita $idcita
     * @return Visitapaciente
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
     * Set idpaciente
     *
     * @param \HC\HCBundle\Entity\Paciente $idpaciente
     * @return Visitapaciente
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
}
