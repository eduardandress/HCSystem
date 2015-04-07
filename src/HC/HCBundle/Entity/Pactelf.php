<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pactelf
 */
class Pactelf
{
    /**
     * @var integer
     */
    private $idpactelf;

    /**
     * @var \HC\HCBundle\Entity\Tipotel
     */
    private $idtipotel;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var \HC\HCBundle\Entity\Paciente
     */
    private $idpaciente;


    /**
     * Get idpactelf
     *
     * @return integer 
     */
    public function getIdpactelf()
    {
        return $this->idpactelf;
    }

    /**
     * Set idtipotel
     *
     * @param integer $idtipotel
     * @return Pactelf
     */
    public function setIdtipotel($idtipotel)
    {
        $this->idtipotel = $idtipotel;

        return $this;
    }

    /**
     * Get idtipotel
     *
     * @return integer 
     */
    public function getIdtipotel()
    {
        return $this->idtipotel;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Pactelf
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set idpaciente
     *
     * @param \HC\HCBundle\Entity\Paciente $idpaciente
     * @return Pactelf
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
