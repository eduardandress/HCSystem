<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diagnosticomedico
 */
class Diagnosticomedico
{
    /**
     * @var integer
     */
    private $iddiagnosticomed;

    /**
     * @var integer
     */
    private $iddiagnostico;

    /**
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idmedico;


    /**
     * Get iddiagnosticomed
     *
     * @return integer 
     */
    public function getIddiagnosticomed()
    {
        return $this->iddiagnosticomed;
    }

    /**
     * Set iddiagnostico
     *
     * @param integer $iddiagnostico
     * @return Diagnosticomedico
     */
    public function setIddiagnostico($iddiagnostico)
    {
        $this->iddiagnostico = $iddiagnostico;

        return $this;
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
     * Set idmedico
     *
     * @param \HC\HCBundle\Entity\Usuario $idmedico
     * @return Diagnosticomedico
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
