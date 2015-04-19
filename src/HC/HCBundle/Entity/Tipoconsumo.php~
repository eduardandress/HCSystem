<?php

namespace HC\HCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoconsumo
 */
class Tipoconsumo
{
    /**
     * @var integer
     */
    private $idtipoconsumo;

    /**
     * @var string
     */
    private $nombre;


   
    /**
     * Get idtipoconsumo
     *
     * @return integer 
     */
    public function getIdtipoconsumo()
    {
        return $this->idtipoconsumo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Tipoconsumo
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

    public function __toString(){
        return $this->nombre;
    }
}
