<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prescripcionmedico
 */
class Prescripcionmedico
{
    /**
     * @var integer
     */
    private $idpresmedico;

    /**
     * @var integer
     */
    private $idprescripcion;

    /**
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idmedico;


    /**
     * Get idpresmedico
     *
     * @return integer 
     */
    public function getIdpresmedico()
    {
        return $this->idpresmedico;
    }

    /**
     * Set idprescripcion
     *
     * @param integer $idprescripcion
     * @return Prescripcionmedico
     */
    public function setIdprescripcion($idprescripcion)
    {
        $this->idprescripcion = $idprescripcion;

        return $this;
    }

    /**
     * Get idprescripcion
     *
     * @return integer 
     */
    public function getIdprescripcion()
    {
        return $this->idprescripcion;
    }

    /**
     * Set idmedico
     *
     * @param \HC\HCBundle\Entity\Usuario $idmedico
     * @return Prescripcionmedico
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
}
