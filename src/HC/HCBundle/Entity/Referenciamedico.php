<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referenciamedico
 */
class Referenciamedico
{
    /**
     * @var integer
     */
    private $idrefmedico;

    /**
     * @var \HC\HCBundle\Entity\Usuario
     */
    private $idmedico;


    /**
     * Get idrefmedico
     *
     * @return integer 
     */
    public function getIdrefmedico()
    {
        return $this->idrefmedico;
    }

    /**
     * Set idmedico
     *
     * @param \HC\HCBundle\Entity\Usuario $idmedico
     * @return Referenciamedico
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
