<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoaccion
 */
class Tipoaccion
{
    /**
     * @var integer
     */
    private $idtipoaccion;

    /**
     * @var string
     */
    private $nombre;

    public function __toString(){
        return $this->nombre;
    }
    /**
     * Get idtipoaccion
     *
     * @return integer 
     */
    public function getIdtipoaccion()
    {
        return $this->idtipoaccion;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Tipoaccion
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
        return $this->idtipoaccion;
    }
}
