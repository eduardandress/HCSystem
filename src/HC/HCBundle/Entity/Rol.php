<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;
/**
 * Rol
 */
class Rol implements RoleInterface
{
    /**
     * @var integer
     */
    private $idrol;

    /**
     * @var string
     */
    private $nombre;



    public function __toString(){
        return $this->nombre;
    }
    /**
     * Get idrol
     *
     * @return integer 
     */
    public function getIdrol()
    {
        return $this->idrol;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Rol
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
    public function getId(){
        return $this->idrol;
    }
     public function getRole() {
        return $this->getNombre();
    }
 
   
}
