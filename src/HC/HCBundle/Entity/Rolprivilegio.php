<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rolprivilegio
 */
class Rolprivilegio
{
    /**
     * @var integer
     */
    private $idrolprivilegio;

    /**
     * @var \HC\HCBundle\Entity\Rol
     */
    private $idrol;

    /**
     * @var \HC\HCBundle\Entity\Privilegio
     */
    private $idprivilegio;


    /**
     * Get idrolprivilegio
     *
     * @return integer 
     */
    public function getIdrolprivilegio()
    {
        return $this->idrolprivilegio;
    }

    /**
     * Set idrol
     *
     * @param \HC\HCBundle\Entity\Rol $idrol
     * @return Rolprivilegio
     */
    public function setIdrol(\HC\HCBundle\Entity\Rol $idrol = null)
    {
        $this->idrol = $idrol;

        return $this;
    }

    /**
     * Get idrol
     *
     * @return \HC\HCBundle\Entity\Rol 
     */
    public function getIdrol()
    {
        return $this->idrol;
    }

    /**
     * Set idprivilegio
     *
     * @param \HC\HCBundle\Entity\Privilegio $idprivilegio
     * @return Rolprivilegio
     */
    public function setIdprivilegio(\HC\HCBundle\Entity\Privilegio $idprivilegio = null)
    {
        $this->idprivilegio = $idprivilegio;

        return $this;
    }

    /**
     * Get idprivilegio
     *
     * @return \HC\HCBundle\Entity\Privilegio 
     */
    public function getIdprivilegio()
    {
        return $this->idprivilegio;
    }
    public function getId(){
        return $this->idrolprivilegio;
    }
}
