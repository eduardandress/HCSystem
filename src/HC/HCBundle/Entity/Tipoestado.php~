<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoestado
 */
class Tipoestado
{
    /**
     * @var integer
     */
    private $idtipoestado;

    /**
     * @var string
     */
    private $nombre;

    public function __toString(){
        return $this->nombre;
    }
    /**
     * Get idtipoestado
     *
     * @return integer 
     */
    public function getIdtipoestado()
    {
        return $this->idtipoestado;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Tipoestado
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
        return $this->idtipoestado;
    }
}
